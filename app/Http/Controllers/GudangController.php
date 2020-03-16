<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facedes\DB;
use App\Gudang;
use Illuminate\Http\Request;

use App\Exports\GudangExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $gudang = Gudang::all();
        $gudang = Gudang::paginate(3);

        return view('dashboard.main2', ['gudang' => $gudang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gudang = new Gudang;
        $gudang->nama_obat = $request->nama;
        $gudang->jenis_obat = $request->jenis;
        $gudang->harga = $request->harga;
        $gudang->stok = $request->stok;

        $file       = $request->file('photo');

        $namefile   = $file->getClientOriginalName();

        $request->file('photo')->move("images/", $namefile);

        $gudang->gambar = $namefile;

        $gudang->save();

        return redirect('/dashboard/main2');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('/dashboard/main2');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gudang $gudang)
    {
        return view('edit2',compact('gudang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gudang $gudang)
    {
         $gudang = Gudang::where('id', $gudang->id)->first();

        $gudang->nama_obat = $request['nama'];
        $gudang->jenis_obat = $request['jenis'];
        $gudang->harga = $request['harga'];
        $gudang->stok = $request['stok'];

        if($request->file('photo') == "")
        {
           $gudang->gambar = $gudang->gambar; } 
        else
        {
            $file       = $request->file('photo');
            $namefile   = $file->getClientOriginalName();
            $request->file('photo')->move("images/", $namefile);
            $gudang->gambar = $namefile; }
        
        $gudang->update();

        return redirect('/dashboard/main2');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gudang $gudang)
    {
         Gudang::destroy($gudang->id);
        return redirect('/dashboard/main2');
    }
     public function export_excel()
    {
        return Excel::download(new GudangExport, 'gudang.xlsx');
    }
}
