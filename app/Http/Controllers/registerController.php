<?php

namespace App\Http\Controllers;

use App\Jobs\NewUserJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use App\Mail\newUser;

class registerController extends Controller
{

    public function create(){
        return view('register.create');
    }
    public function store(){

        $userInputs=request()->validate([
            'name' => 'required|max:255|min:4|unique:users,name',//we have 2ways to validate unique item ==>this one of them
            'username' => 'required|max:255|min:4',
            'email' =>['required','email','max:255',Rule::unique('users','email')],//this is the other way
            'password' => 'required|min:7|max:255',
            'thumbnail' => 'required|image'
        ]);
        $userInputs['thumbnail']=request()->file('thumbnail')->store('userThumbnails');
        $user=User::create($userInputs);
        NewUserJob::dispatch($user);
        return back()->with('success','Your account has been created successfully Please wait the approval of admin');
    }

}
