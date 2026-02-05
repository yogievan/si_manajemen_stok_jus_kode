<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class uomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $satuan = [
            ['nama_uom' => 'Bal'],
            ['nama_uom' => 'Botol'],
            ['nama_uom' => 'Box'],
            ['nama_uom' => 'Derijen'],
            ['nama_uom' => 'Gram'],
            ['nama_uom' => 'Kaleng'],
            ['nama_uom' => 'Kg'],
            ['nama_uom' => 'Liter'],
            ['nama_uom' => 'ML'],
            ['nama_uom' => 'Pack'],
            ['nama_uom' => 'Pcs'],
            ['nama_uom' => 'Porsi'],
            ['nama_uom' => 'Roll'],
            ['nama_uom' => 'Unit'],
        ];


        DB::table('unit_of_measurement')->insert($satuan);
    }
}
