<?php

namespace App\Http\Controllers;

use App\Jobs\NewUserJob;
use App\Jobs\UserApproveJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class adminUserController extends Controller
{
    protected function validateUser(User $user=null){
        $user ??=new User();
        return request()->validate([
            'name' => 'required|min:6|max:255',
            'username' => ['required','min:6','max:255',Rule::unique('users','username')->ignore($user)],
            'email' => ['required','min:6','max:255','email',Rule::unique('users','email')->ignore($user)],
            'password' => 'required|min:6|max:255',
            'thumbnail' => $user->exists ? ['image']:['required','image'],
            'role' => 'required|exists:users,role'
        ]);
    }

    public function allUsers(){
        $user=User::latest()->filter(request('name'))->get();
        return view('admin.users.all',['allUser'=>$user]);
    }

//    public function userTable(){
//        $users = User::all();
//        return Datatables::of($users)->addColumn('action', function ($users) {
//            return '<a href="/admin/users/'.$users->id.'/edit" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</a>
//                    <a href="/admin/users/'.$users->id.'/delete" class="btn btn-xs btn-danger " style="margin-left: 8px"><i class="glyphicon glyphicon-edit"></i> Delete</a>
//                    <a href="/admin/users/'.$users->id.'/change" class="btn btn-xs btn-primary " style="margin-left: 8px"><i class="glyphicon glyphicon-edit"></i> Change Role</a>';
//        })->make(true);
//    }

    public function editUser(User $user){
        return view('admin.users.edit',['user'=>$user]);
    }

    public function updateUser(User $user){

        $attr=$this->validateUser($user);
        if(request()->file('thumbnail')){
            $attr['thumbnail']=request()->file('thumbnail')->store('admin/userThumbnails');
        }

        $user->update($attr);
        return redirect('admin/users/all');
    }

    public function deleteUser(User $user){
        $user->forceDelete();
        return back();
    }

    public function changeRole(User $user){
        ($user->role == 'admin')?$user->update(['role'=>'user']):$user->update(['role'=>'admin']);
        return back();
    }

    public function changeStatus(User $user){
        if($user->status =='waiting'){
            $user->update(['status' => 'approved']);
            UserApproveJob::dispatch($user);
        }else{
            $user->update(['status' => 'waiting']);
        }
        return back();
    }

    public function createUser(){
        return view('admin.users.create');
    }

    public function storeUser(){
        User::create(array_merge($this->validateUser(),[
            'thumbnail' => request()->file('thumbnail')->store('admin/userThumbnails'),
            'status'=>'approved']));
        return redirect('admin/users/all');
    }
}
