<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class adminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function login(){
        return view('admin.login');
    }

    public function check(){
       $data =request()->validate([
           'email' => ['required','min:7','max:255',Rule::exists('users','email')],
           'password' => 'required|min:7|max:255'
        ]);
       if(auth()->attempt($data) && auth()->user()->role==='admin'){
           return redirect('/admin/dashboard');
       }else{
           return redirect('/');
       }
    }

    public function destroySession(){
        Auth::logout();
        return redirect('admin/login');
    }

    public function account(){
        return view('admin.profile');
    }
}
