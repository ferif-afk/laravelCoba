<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function view () {
		// return view('dashboard');//mengembalikan view
		// $user = User ::where("email", "foorbal2gmai.com")->first(); menampilkan data /mencari
		// $user = User ::findorfail(2); menampilkan data /mencari jika tidak ada eror
		// $user = User ::find(2); //menampilkan data /mencari
		// $user = User ::select("nama"); //  nama dan email aja
		 // $user = User ::all(); untuk semua data

// mengambil data dari table pegawai
    	$users = DB::table('data_obat')->get();
 
    	// mengirim data pegawai ke view index
    	return view('welcome',['data_obat' => $users]);
		// return response()->json($user);
    }
 //    // method untuk menampilkan view form tambah pegawai
	public function tambah()
	{
 
		// memanggil view tambah
		return view('tambah');
 
	}
 
	// method untuk insert data ke table pegawai
	public function store(Request $request)
	{
		// insert data ke table pegawai
		DB::table('data_game')->insert([
			'id' => $request->ID,
			'nama_obat' => $request->Nama_Obat,
			'jenis_obat' => $request->Jenis_Obat,
			'harga' => $request->Harga,
			'pembeli' => $request->Pembeli,
			
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/');
 
	}
 
	// method untuk edit data pegawai
	public function edit($No)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$user = DB::table('data_obat')->where('No',$No)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
		return view('edit',['data_obat' => $user]);
 
	}
 
	// update data pegawai
	public function update(Request $request)
	{
		// update data pegawai
		DB::table('data_obat')->where('No',$request->No)->update([
			'id' => $request->ID,
			'nama_obat' => $request->Nama_Obat,
			'jenis_obat' => $request->Jenis_Obat,
			'harga' => $request->Harga,
			'pembeli' => $request->Pembeli,
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/index');
	}
 
	// method untuk hapus data pegawai
	public function hapus($No)
	{
		// menghapus data pegawai berdasarkan id yang dipilih
		DB::table('data_obat')->where('No',$No)->delete();
		
		// alihkan halaman ke halaman pegawai
		return redirect('/index');
	}

	// public function detail($id)
	// {
	// 	$user = DB::table('data_game')->where('id',$id)->get();
	// 	// passing data pegawai yang didapat ke view edit.blade.php
	// 	return view('detail',['data_game' => $user]);
	// }
}