<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facedes\DB;
use App\Obat;
use Illuminate\Http\Request;

use App\Exports\ObatExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AdminObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $obat = obat::when($request->search, function ($query) use ($request) {
                $query->where('nama_obat', 'LIKE', "%{$request->search}%")
                      ->orWhere('jenis_obat', 'LIKE', "%{$request->search}%")
                      ->orWhere('harga', 'LIKE', "%{$request->search}%");
                })->paginate(3);

        return view('dashboard.main', ['obat' => $obat]);
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

        $file       = $request->file('photo');

        $namefile   = $file->getClientOriginalName();

        $request->file('photo')->move("images/", $namefile);

        $obat->gambar = $namefile;

        $obat->save();

        return redirect('/dashboard/main');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('/dashboard/main');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        Obat::destroy($obat->id);
        return redirect('/dashboard/main');
    }

       public function export_excel()
    {
        return Excel::download(new ObatExport, 'obat.xlsx');
    }
}
