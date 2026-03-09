<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;
use App\Models\Kategori;
use App\Models\uom;
use App\Models\Inventori;
use App\Models\permintaanBahanBaku;
use App\Models\permintaanBahanBakuDetail;
use Carbon\Carbon;

class managerController extends Controller
{
    public function dashboardManager()
    {
        return view('manager.dashboard');
    }

    public function inventoriManager()
    {
        $inventori = Inventori::orderBy('id', 'asc')->get();
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
        return view('manager.inventori',compact('inventori', 'kategori', 'uom', 'colorMap'));
    }

    public function laporanPermintaanBahanBakuManager()
    {
        $permintaanBahanBaku = permintaanBahanBaku::orderBy('id', 'desc')->get();
        return view('manager.laporanPermintaanBahanBaku',compact('permintaanBahanBaku'));
    }
    public function tambahLaporanPermintaanBahanBakuManager()
    {
        $uom = uom::all();
        $inventori = Inventori::with('uom')->get();
        $permintaanBahanBaku = permintaanBahanBaku::orderBy('id', 'desc')->get();
        return view('manager.tambahLaporanPermintaanBahanBaku', compact('inventori', 'uom', 'permintaanBahanBaku'));
    }
    public function simpanLaporanPermintaanBahanBakuManager(Request $request)
    {
        $permintaanBahanBaku = permintaanBahanBaku::orderBy('id', 'desc')->get();
        $tanggal = Carbon::parse($request->tgl_request)->setTimeFrom(Carbon::now());
        $laporanPermintaanBahanBaku = permintaanBahanBaku::create([
            'tgl_request' => $tanggal,
            'keterangan_manager' => $request->keterangan_manager,
            'status_finance' => 'Pending',
        ]);
        foreach($request->id_inventori as $key => $inventori){
            permintaanBahanBakuDetail::create([
                'id_laporan_permintaan' => $laporanPermintaanBahanBaku->id,
                'id_inventori' => $inventori,
                'qty_request' => $request->qty_request[$key],
            ]);
        }
        Alert::toast('Pengajuan Bahan Baku Berhasil di tambahakan!','success');
        return redirect()->route('manager.laporanPermintaanBahanBaku');
    }

    public function laporanKedatanganBahanBakuManager()
    {
        return view('manager.laporanKedatanganBahanBaku');
    }

    public function laporanPenjualanHarianManager()
    {
        return view('manager.laporanPenjualanHarian');
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
