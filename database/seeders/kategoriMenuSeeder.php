<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriMenu = [
            ['nama_kategori' => 'Jus Besar'],
            ['nama_kategori' => 'Jus Kecil'],
            ['nama_kategori' => 'Makanan'],
            ['nama_kategori' => 'Yogurt Series'],
            ['nama_kategori' => 'Pro Jus'],
            ['nama_kategori' => 'Super Jus'],
            ['nama_kategori' => 'Add-Ons'],
        ];

        DB::table('kategori_menu')->insert($kategoriMenu);
    }
}
