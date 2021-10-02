<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller{

    public function create(){
        return view('register.create');
    }

    public function store(){
        //return request()->all();
        /*users registration */
           $attributes = request()->validate([
               'name'=>'required |max:200|min:3',
                //'name'=>['required','max:200','min:3'],
               'username'=>'required|min:8|max:30|unique:users,username',
               //'username'=>['required','max:200','min:4',Rule::unique('users','username')],
               'email'=>'required|email|max:200|unique:users,email',
               //'email'=>['required','email','max:200',Rule::unique('users','email')],
               'password'=>'required|min:8|max:30'
               //'password'=>['required','max:30','min:8']
                   /* 'password'=>'required|min:8|max:30',  == 'password'=>['required','min:8','max:30']*/
           ]);

           //$attributes['password']=bcrypt($attributes['password']);

           $user = User::create($attributes);
           /*log in the user*/
            auth()->login($user);

           //return redirect('/');
            return redirect('/')->with('success', 'Your account has been created successfully:)');

        //if validation doesn't succeed we won't reach the following dd
           //dd('validation succeeded');
    }
}

