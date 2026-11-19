<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class menuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            // --- KATEGORI 1: Jus Besar ---
            ['nama_menu' => 'Jus Alpukat Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Jus Mangga Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Jus Mix Berry Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Jus Stroberi Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Jus Melon Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Jus Naga Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Jus Sirsak Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Jus Jambu Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Jus Pisang Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Jus Wortel Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Jus Nanas Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Jus Markisa Besar', 'id_kategori' => 1],
            ['nama_menu' => 'Es Jeruk', 'id_kategori' => 1],

            // --- KATEGORI 2: Jus Kecil ---
            ['nama_menu' => 'Korean Banana', 'id_kategori' => 2],
            ['nama_menu' => 'Banofee', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Alpukat Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Mangga Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Mix Berry Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Stroberi Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Melon Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Naga Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Sirsak Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Jambu Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Pisang Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Wortel Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Nanas Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Jus Markisa Kecil', 'id_kategori' => 2],
            ['nama_menu' => 'Es Jeruk Nipis', 'id_kategori' => 2],
            ['nama_menu' => 'Es Alpukat Kotjok', 'id_kategori' => 2],
            ['nama_menu' => 'Es Naga Kotjok', 'id_kategori' => 2],
            ['nama_menu' => 'Milk Shake Stroberi', 'id_kategori' => 2],
            ['nama_menu' => 'Milki Shake Coklat', 'id_kategori' => 2],

            // --- KATEGORI 3: Makanan ---
            ['nama_menu' => 'Pisang Coklat Goreng', 'id_kategori' => 3],
            ['nama_menu' => 'Cireng Goreng', 'id_kategori' => 3],
            ['nama_menu' => 'Stik Keju Goreng', 'id_kategori' => 3],
            ['nama_menu' => 'Egg Roll Goreng', 'id_kategori' => 3],
            ['nama_menu' => 'Fish Roll Goreng', 'id_kategori' => 3],
            ['nama_menu' => 'Mini Wonton', 'id_kategori' => 3],
            ['nama_menu' => 'Otak-otak Goreng', 'id_kategori' => 3],
            ['nama_menu' => 'Kentang Goreng', 'id_kategori' => 3],
            ['nama_menu' => 'Singkong Goreng', 'id_kategori' => 3],
            ['nama_menu' => 'Indomie Goreng Single', 'id_kategori' => 3],
            ['nama_menu' => 'Indomie Soto Single', 'id_kategori' => 3],
            ['nama_menu' => 'Indomie Ayam Bawang Single', 'id_kategori' => 3],
            ['nama_menu' => 'Indomie Goreng Double', 'id_kategori' => 3],
            ['nama_menu' => 'Indomie Soto Double', 'id_kategori' => 3],
            ['nama_menu' => 'Indomie Ayam Bawang Double', 'id_kategori' => 3],
            ['nama_menu' => 'Seblak', 'id_kategori' => 3],
            ['nama_menu' => 'Bakso Aci', 'id_kategori' => 3],
            ['nama_menu' => 'Roti Bakar Coklat', 'id_kategori' => 3],
            ['nama_menu' => 'Roti Bakar Keju', 'id_kategori' => 3],
            ['nama_menu' => 'Roti Bakar Coklat Keju', 'id_kategori' => 3],
            ['nama_menu' => 'Roti Bakar Coklat Keju Es Krim', 'id_kategori' => 3],
            ['nama_menu' => 'Roti Bakar Srikaya', 'id_kategori' => 3],
            ['nama_menu' => 'Roti Bakar Telur Kornet', 'id_kategori' => 3],

            // --- KATEGORI 4: Yogurt Series ---
            ['nama_menu' => 'Yogurt Cosmic', 'id_kategori' => 4],
            ['nama_menu' => 'Yogurt Cookie', 'id_kategori' => 4],
            ['nama_menu' => 'Yogurt Ocean', 'id_kategori' => 4],
            ['nama_menu' => 'Yogurt Paradise', 'id_kategori' => 4],

            // --- KATEGORI 5: Pro Jus ---
            ['nama_menu' => 'Whey Coklat', 'id_kategori' => 5],
            ['nama_menu' => 'Whey Stroberi', 'id_kategori' => 5],
            ['nama_menu' => 'Whey Mangga', 'id_kategori' => 5],
            ['nama_menu' => 'Whey Markisa', 'id_kategori' => 5],

            // --- KATEGORI 6: Super Jus ---
            ['nama_menu' => 'Jus Mata', 'id_kategori' => 6],
            ['nama_menu' => 'Jus Kolesterol', 'id_kategori' => 6],
            ['nama_menu' => 'Jus Jantung', 'id_kategori' => 6],
            ['nama_menu' => 'Jus Radang', 'id_kategori' => 6],
            ['nama_menu' => 'Jus Anti Kanker', 'id_kategori' => 6],
            ['nama_menu' => 'Jus Diabetes', 'id_kategori' => 6],

            // --- KATEGORI 7: Add-Ons ---
            ['nama_menu' => 'Alpukat', 'id_kategori' => 7],
            ['nama_menu' => 'Mangga', 'id_kategori' => 7],
            ['nama_menu' => 'Black Berry', 'id_kategori' => 7],
            ['nama_menu' => 'Stroberi', 'id_kategori' => 7],
            ['nama_menu' => 'Melon', 'id_kategori' => 7],
            ['nama_menu' => 'Naga', 'id_kategori' => 7],
            ['nama_menu' => 'Sirsak', 'id_kategori' => 7],
            ['nama_menu' => 'Jambu', 'id_kategori' => 7],
            ['nama_menu' => 'Pisang', 'id_kategori' => 7],
            ['nama_menu' => 'Wortel', 'id_kategori' => 7],
            ['nama_menu' => 'Tomat', 'id_kategori' => 7],
            ['nama_menu' => 'Nanas', 'id_kategori' => 7],
            ['nama_menu' => 'Markisa', 'id_kategori' => 7],

            ['nama_menu' => 'Madu', 'id_kategori' => 7],
            ['nama_menu' => 'Stevia', 'id_kategori' => 7],
            ['nama_menu' => 'Es Krim', 'id_kategori' => 7],
            ['nama_menu' => 'SKM Putih Jus Besar', 'id_kategori' => 7],
            ['nama_menu' => 'SKM Coklat Jus Besar', 'id_kategori' => 7],
            ['nama_menu' => 'SKM Putih Jus Kecil', 'id_kategori' => 7],
            ['nama_menu' => 'SKM Coklat Jus Kecil', 'id_kategori' => 7],
            ['nama_menu' => 'Chia Pudding', 'id_kategori' => 7],

            ['nama_menu' => 'Telur', 'id_kategori' => 7],
            ['nama_menu' => 'Kornet', 'id_kategori' => 7],
            ['nama_menu' => 'Coklat', 'id_kategori' => 7],
            ['nama_menu' => 'Keju', 'id_kategori' => 7],
        ];

        DB::table('menu')->insert($menus);
    }
}
