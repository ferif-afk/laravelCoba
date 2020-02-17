<?php

use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table obat
        DB::table('data_obat')->insert([
        	'nama_obat' => 'Lemah lesu',
        	'jenis_obat' => 'herbal',
        	'harga' => '25000',
        	'pembeli' => 'Brudin',
        	'gambar' => 'uhuy.jpg'
        ]);
    }
}
