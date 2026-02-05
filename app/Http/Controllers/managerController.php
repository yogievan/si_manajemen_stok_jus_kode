<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\uom;
use App\Models\Inventori;

class managerController extends Controller
{
    public function dashboardManager()
    {
        return view('manager.dashboard');
    }

    public function inventoriManager()
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
        return view('manager.inventori',[
            'inventori' => $inventori,
            'kategori' => $kategori,
            'uom' => $uom,
        ],compact('kategori', 'colorMap'));
    }

    public function laporanKedatanganBahanBakuManager()
    {
        return view('manager.laporanKedatanganBahanBaku');
    }

    public function laporanPenjualanHarianManager()
    {
        return view('manager.laporanPenjualanHarian');
    }

    public function laporanRequestBahanBakuManager()
    {
        return view('manager.laporanRequestBahanBaku');
    }

    public function laporanStockHarianManager()
    {
        return view('manager.laporanStockHarian');
    }

    public function laporanStockOpnameManager()
    {
        return view('manager.laporanStockOpname');
    }
}
