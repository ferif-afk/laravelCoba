<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facedes\DB;
use App\Obat;
use Illuminate\Http\Request;

use App\Exports\ObatExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = Obat::all();
        $obat = Obat::paginate(3);

        return view('obat.index', ['data' => $obat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obat = new Obat;
        $obat->nama_obat = $request->nama;
        $obat->jenis_obat = $request->jenis;
        $obat->harga = $request->harga;
        $obat->pembeli = $request->pembeli;

        $file       = $request->file('photo');

        $namefile   = $file->getClientOriginalName();

        $request->file('photo')->move("images/", $namefile);

        $obat->gambar = $namefile;

        $obat->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        return view('edit',compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $obat = Obat::where('id', $obat->id)->first();

        $obat->nama_obat = $request['nama'];
        $obat->jenis_obat = $request['jenis'];
        $obat->harga = $request['harga'];
        $obat->pembeli = $request['pembeli'];

        if($request->file('photo') == "")
        {
           $obat->gambar = $obat->gambar; } 
        else
        {
            $file       = $request->file('photo');
            $namefile   = $file->getClientOriginalName();
            $request->file('photo')->move("images/", $namefile);
            $obat->gambar = $namefile; }
        
        $obat->update();

        return redirect('/');
    }

    public function search(Request $request){
      $obat = obat::when($request->search, function ($query) use ($request) {
                $query->where('nama_obat', 'LIKE', "%{$request->search}%")
                      ->orWhere('jenis_obat', 'LIKE', "%{$request->search}%")
                      ->orWhere('harga', 'LIKE', "%{$request->search}%")
                      ->orWhere('pembeli', 'LIKE', "%{$request->search}%");
                })->paginate(3);
      return view ('/obat/index', ['data' => $obat]);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        Obat::destroy($obat->id);
        return redirect('/');
    }

        public function export_excel()
    {
        return Excel::download(new ObatExport, 'obat.xlsx');
    }

}
