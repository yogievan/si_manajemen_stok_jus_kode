<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Bahan Makanan'],
            ['nama_kategori' => 'Plastik'],
            ['nama_kategori' => 'Buah'],
            ['nama_kategori' => 'Kebersihan'],
            ['nama_kategori' => 'Others'],
            ['nama_kategori' => 'Aset'],
        ];


        DB::table('kategori')->insert($kategori);
    }
}
