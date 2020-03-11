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

    public function loginprocess(Request $request)
    {
    	// $this->validate(Request)
    	if (Auth::attempt($request->only('email', 'password'))) {
    			return redirect('/obat');
    	}
		return redirect('/login');    	

    	// dd($request->all());
    }

    public function logout()
    {
    	Auth::loguot();
    	return redirect('/login');
    }
}
