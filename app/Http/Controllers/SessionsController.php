<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller{
    /*LOG OUT*/
    public function destroy(){
        //ddd('user logged out');
        auth()->logout();
        return redirect('/')->with('success','Hope to see you again ;)');
    }
    /*LOG IN*/
    public function create(){
        return view('sessions.create');
    }
    /*VALIDATE REQUEST*/
    public function store(){
       /*attempt to authenticate and log in users based on given info then show flash msg  */
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        /*VALIDATE AUTH ATTEMPT*/
        /*auth is take care of login and check the pass. if correct*/
        if (! auth()->attempt($attributes)){

            /*if auth() failed*/ /*2 ways*/
            /*2ed way*/
            throw ValidationException::withMessages(['email'=>'you do not have an account']);
            /*1st way*/
            /*withInput to include the written values rather than empty*/
            /*return back()->withInput()->withErrors(['email'=>'you do not have an account']);*/
        }

        /*if user signed in successfully -> regenerate the session ---> then redirect */
        /*session fixation*/
        session()->regenerate();

        return redirect('/')->with('success', 'You are Loged in Now ');

    }
}
