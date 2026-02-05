<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\uom;
use App\Models\Inventori;

class picController extends Controller
{
    public function dashboardPic()
    {
        return view('pic.dashboard');
    }

    public function inventoriPic()
    {
        $inventori = Inventori::orderBy('id_kategori', 'asc')->get();
        $kategori = Kategori::all();
        $colorMap = [
            1 => 'bg-amber-200',
            2 => 'bg-blue-300',
            3 => 'bg-red-300',
            4 => 'bg-green-400',
            5 => 'bg-black text-white',
            6 => 'bg-red-600 text-white',
        ];
        $uom = uom::all();
        return view('pic.inventori',[
            'inventori' => $inventori,
            'kategori' => $kategori,
            'uom' => $uom,
        ],compact('kategori', 'colorMap'));
    }

    public function laporanKedatanganBahanBakuPic()
    {
        return view('pic.laporanKedatanganBahanBaku');
    }

    public function laporanPenjualanHarianPic()
    {
        return view('pic.laporanPenjualanHarian');
    }

    public function laporanStockHarianPic()
    {
        return view('pic.laporanStockHarian');
    }
}
