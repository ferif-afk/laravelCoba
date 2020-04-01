<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $table = 'data_gudang';
    protected $fillable = ['nama_obat','jenis_obat', 'stok', 'harga', 'gambar'];
    public $timestamps = false;
}
