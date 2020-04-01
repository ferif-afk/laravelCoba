<?php

namespace App\Exports;

use App\Gudang;
use Maatwebsite\Excel\Concerns\FromCollection;

class GudangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gudang::all();
    }
}
