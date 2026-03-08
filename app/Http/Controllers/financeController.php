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

        // delete confirmation message
        $title = 'Hapus Bahan Baku di Inventori!';
        $text = "Apakah kamu ingin menghapus bahan baku ini?";
        confirmDelete($title, $text);

        return view('finance.inventori',[
            'inventori' => $inventori,
            'kategori' => $kategori,
            'uom' => $uom,
        ],compact('kategori', 'colorMap', 'inventori'));
    }
    public function tambahInventoriFinance(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'id_kategori' => 'required|integer',
            'id_uom' => 'required|integer',
        ]);
        Inventori::create([
            'nama_barang' => $request->input('nama_barang'),
            'id_kategori' => $request->input('id_kategori'),
            'stock' => $request->input('stock'),
            'lead_time' => $request->input('lead_time'),
            'average_daily_usage' => $request->input('average_daily_usage'),
            'safety_stock' => $request->input('safety_stock'),
            'reorder_point' => $request->input('reorder_point'),
            'id_uom' => $request->input('id_uom'),
        ]);
        Alert::toast('Items Berhasil di tambahakan!','success');
        return Redirect::back();
    }
    public function editInventoriFinance(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'nama_barang' => 'required',
            'id_kategori' => 'required|integer',
            'id_uom' => 'required|integer',
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

        Alert::toast('Items Berhasil diperbarui','success');
        return Redirect::back();
    }
    public function hapusInventoriFinance($id)
    {
        $inventori = Inventori::findOrFail($id);
        $inventori->delete();
        Alert::toast('Items Berhasil di hapus!','success');
        return Redirect::back();
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
