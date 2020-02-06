<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
		return view('obat.index');
	}

	public function about(){

		return view('index', ['nama' => 'Feri Ferdiansyah']);
	}
}