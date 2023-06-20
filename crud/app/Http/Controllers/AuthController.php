<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    
    
    public function registerPost(Request $request){

        $request->validate([
            'email'=>[
                'required',
                'email',
                Rule::unique('users', 'email'),
            ] 
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
            

        $user->save();

        return back()->with('success','register successfully!');
    
           
       
    }

    public function login(){

        return view('login');
    }

    public function loginPost(Request $request){
        $credential = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if (Auth::attempt($credential)){
            return redirect('/')->with('success',"Login Successfully!");
        }
        return back()->with('error','Invalis Credential!');
    }

    public function logout(){
        Auth::logout();

        return redirect('user-login');
    }
}
