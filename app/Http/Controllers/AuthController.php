<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
    	return view('auths.login'); 
    }

    public function postLogin(Request $request)
    {
    	// $this->validate(Request)
    	if (Auth::attempt($request->only('email', 'password'))) {
    			return redirect('/');
    	}
		return redirect('auths.login');    	

    	// dd($request->all());
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('loginForm');
    }
}
