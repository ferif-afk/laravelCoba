<?php

use Illuminate\Database\Seeder;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('data_obat')->insert([
        	'nama_obat' => 'Lemah lesu',
        	'jenis_obat' => 'herbal',
        	'harga' => '25000',
        	'stok' => '25,'
        	'pembeli' => 'Brudin',
        	'gambar' => 'uhuy.jpg'
        ]);
    }
}
