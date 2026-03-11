<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\uom;
use App\Models\Inventori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;

class financeController extends Controller
{
    public function dashboardFinance()
    {
        return view('finance.dasboard');
    }

    public function inventoriFinance()
    {
        $inventori = Inventori::orderBy('id_kategori', 'asc')->orderBy('id', 'asc')->get();
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
        return view('finance.inventori',compact('kategori', 'colorMap', 'inventori', 'uom'));
    }
    public function tambahInventoriFinance(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'id_kategori' => 'required|integer',
            'id_uom' => 'required|integer',
            'stock' => 'nullable|integer',
            'lead_time' => 'nullable|integer',
            'average_daily_usage' => 'nullable|integer',
            'safety_stock' => 'nullable|integer',
            'reorder_point' => 'nullable|integer',
        ]);
        Inventori::create([
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'stock' => $request->stock,
            'lead_time' => $request->lead_time,
            'average_daily_usage' => $request->average_daily_usage,
            'safety_stock' => $request->safety_stock,
            'reorder_point' => $request->reorder_point,
            'id_uom' => $request->id_uom,
        ]);
        Alert::toast('Bahan Baku Berhasil di tambahakan!','success');
        return redirect()->route('finance.inventori');
    }
    public function editInventoriFinance(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'id_kategori' => 'required|integer',
            'id_uom' => 'required|integer',
            'stock' => 'nullable|integer',
            'lead_time' => 'nullable|integer',
            'average_daily_usage' => 'nullable|integer',
            'safety_stock' => 'nullable|integer',
            'reorder_point' => 'nullable|integer',
        ]);
        $item = Inventori::findOrFail($request->id);

        $item->update([
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'stock' => $request->stock,
            'lead_time' => $request->lead_time,
            'average_daily_usage' => $request->average_daily_usage,
            'safety_stock' => $request->safety_stock,
            'reorder_point' => $request->reorder_point,
            'id_uom' => $request->id_uom,
        ]);

        Alert::toast('Bahan Baku Berhasil diperbarui','success');
        return redirect()->route('finance.inventori');
    }
    public function hapusInventoriFinance($id)
    {
        $inventori = Inventori::findOrFail($id);
        $inventori->delete();
        Alert::toast('Bahan Baku Berhasil di hapus!','success');
        return redirect()->route('finance.inventori');
    }

    public function laporanPermintaanBahanBakuFinance()
    {
        return view('finance.laporanPermintaanBahanBaku');
    }

    public function laporanKedatanganBahanBakuFinance()
    {
        return view('finance.laporanKedatanganBahanBaku');
    }

    public function laporanPenjualanHarianFinance()
    {
        return view('finance.laporanPenjualanHarian');
    }
    public function laporanStockHarianFinance()
    {
        return view('finance.laporanStockHarian');
    }
    public function laporanStockOpnameFinance()
    {
        return view('finance.laporanStockOpname');
    }

    public function pengaturan()
    {
        return view('finance.pengaturan');
    }
}
