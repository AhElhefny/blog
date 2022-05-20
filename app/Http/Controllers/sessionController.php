<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class sessionController extends Controller
{
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('logoutSuccess','logged out successfully');
    }

    public function create(){
        return view('session.create');
    }

    public function store(){

        $cardenality=request()->validate([
            'email'=>'required|email|min:7|max:255',
            'password' =>'required|min:7|max:255'
        ]);

        if(auth()->attempt($cardenality)){
            if(auth()->user()->status !=='approved'){
                Auth::logout();
                return redirect('underApprovement');
            }else{
                session()->regenerate();
                return redirect('/');
            }
        }
        else{
            throw validationException::withMessages(['email'=>'your email or password or both are incorrect']);
        }
    }

}
