<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'data_obat';
    protected $fillable = ['nama_obat','jenis_obat', 'harga', 'gambar'];
    public $timestamps = false;
}
