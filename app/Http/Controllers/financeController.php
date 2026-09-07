<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\uom;
use App\Models\Inventori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;
use App\Models\permintaanBahanBaku;
use App\Models\permintaanBahanBakuDetail;
use App\Models\kedatanganBahanBaku;
use App\Models\kedatanganBahanBakuDetail;
use App\Models\laporanStokHarian;
use Carbon\Carbon;

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
        Alert::toast('Bahan Baku Berhasil ditambahakan!','success');
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
        Alert::toast('Bahan Baku Berhasil dihapus!','success');
        return redirect()->route('finance.inventori');
    }

    public function laporanPermintaanBahanBakuFinance()
    {
        $permintaanBahanBaku = permintaanBahanBaku::orderBy('id', 'desc')->get();
        return view('finance.laporanPermintaanBahanBaku', compact('permintaanBahanBaku'));
    }
    public function detailLaporanPermintaanBahanBakuFinance($id)
    {
        $uom = uom::all();
        $inventori = Inventori::with('uom')->get();
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($id);
        $permintaanBahanBakuDetail = permintaanBahanBakuDetail::where('id_laporan_permintaan', $id)->get();
        return view('finance.detailLaporanPermintaanBahanBaku', compact('permintaanBahanBaku', 'permintaanBahanBakuDetail', 'inventori', 'uom'));
    }
    public function validasiLaporanPermintaanBahanBakuFinance($id)
    {
        $uom = uom::all();
        $inventori = Inventori::with('uom')->get();
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($id);
        $permintaanBahanBakuDetail = permintaanBahanBakuDetail::where('id_laporan_permintaan', $id)->get();
        return view('finance.validasiLaporanPermintaanBahanBaku', compact('inventori', 'uom', 'permintaanBahanBaku', 'permintaanBahanBakuDetail'));
    }
    public function simpanValidasiLaporanPermintaanBahanBakuFinance(Request $request, $id)
    {
        $request->validate([
            'status_finance' => 'required|array',
            'status_finance.*' => 'required',
            'qty_approve' => 'required|array',
            'qty_approve.*' => 'required|numeric|min:0',
        ]);
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($id);
        $permintaanBahanBaku->update([
            'approved_at' => now(),
        ]);

        foreach ($request->id_detail as $key => $detailId) {
            $detail = PermintaanBahanBakuDetail::find($detailId);
            if ($detail) {
                $detail->qty_approve = $request->qty_approve[$key];
                $detail->status_finance = $request->status_finance[$key];
                $detail->keterangan_finance = $request->keterangan_finance[$key] ?? null;
                $detail->save();
            }

        }
        Alert::toast('Validasi Pengajuan Permintaan Bahan Baku Berhasil!','success');
        return redirect()->route('finance.laporanPermintaanBahanBaku');
    }

    public function laporanKedatanganBahanBakuFinance()
    {
        $kedatanganBahanBaku = kedatanganBahanBaku::orderBy('id', 'desc')->get();
        return view('finance.laporanKedatanganBahanBaku', compact('kedatanganBahanBaku'));
    }
    public function detailLaporanKedatanganBahanBakuFinance($id)
    {
       $uom = uom::all();
        $inventori = Inventori::with('uom')->get();
        $kedatanganBahanBaku = kedatanganBahanBaku::findOrFail($id);
        $kedatanganBahanBakuDetail = kedatanganBahanBakuDetail::where('id_laporan_kedatangan', $id)->get();
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($kedatanganBahanBaku->id_request);
        $permintaanBahanBakuDetail = permintaanBahanBakuDetail::where('id_laporan_permintaan', $kedatanganBahanBaku->id_request)->get();
        return view('finance.detailLaporanKedatanganBahanBaku', compact('inventori', 'uom', 'kedatanganBahanBaku', 'kedatanganBahanBakuDetail', 'permintaanBahanBaku', 'permintaanBahanBakuDetail'));
    }
    public function validasiLaporanKedatanganBahanBakuFinance($id)
    {
        $uom = uom::all();
        $inventori = Inventori::with('uom')->get();
        $kedatanganBahanBaku = kedatanganBahanBaku::findOrFail($id);
        $kedatanganBahanBakuDetail = kedatanganBahanBakuDetail::where('id_laporan_kedatangan', $id)->get();
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($kedatanganBahanBaku->id_request);
        $permintaanBahanBakuDetail = permintaanBahanBakuDetail::where('id_laporan_permintaan', $kedatanganBahanBaku->id_request)->get();
        return view('finance.validasiLaporanKedatanganBahanBaku', compact('inventori', 'uom', 'kedatanganBahanBaku', 'kedatanganBahanBakuDetail', 'permintaanBahanBaku', 'permintaanBahanBakuDetail'));
    }
    public function simpanValidasiLaporanKedatanganBahanBakuFinance(Request $request, $id)
    {
        $request->validate([
            'status_finance' => 'required|array',
            'status_finance.*' => 'required',
            'confirm_finance' => 'required|array',
            'confirm_finance.*' => 'required',
        ]);
        $kedatanganBahanBaku = kedatanganBahanBaku::findOrFail($id);
        $kedatanganBahanBaku->update([
            'approved_at' => now(),
        ]);

        foreach ($request->id_detail as $key => $detailId) {
            $detail = kedatanganBahanBakuDetail::find($detailId);
            if ($detail) {
                $detail->status_finance = $request->status_finance[$key];
                $detail->confirm_finance = $request->confirm_finance[$key] ?? null;
                $detail->save();
            }
        }
        Alert::toast('Validasi Laporan Kedatangan Bahan Baku Berhasil!','success');
        return redirect()->route('finance.laporanKedatanganBahanBaku');
    }
    public function laporanStokHarianFinance()
    {
        $laporanStockHarian = laporanStokHarian::orderBy('id', 'desc')->get();
        return view('finance.laporanStokHarian', compact('laporanStockHarian'));
    }
    public function tambahLaporanStokHarianFinance(request $request)
    {
        $laporanStockHarian = laporanStokHarian::orderBy('id', 'desc')->get();
        laporanStokHarian::create([
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'status_manager' => 'Pending',
            'confirm_finance' => 'Pending',
        ]);
        Alert::toast('Laporan Stok Harian Berhasil ditambahkan!','success');
        return redirect()->route('finance.laporanStokHarian');
    }
    public function detailLaporanStokHarianFinance($id)
    {
        $laporanStockHarian = laporanStokHarian::findOrFail($id);
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
        $jumlahHari = Carbon::createFromDate($laporanStockHarian->tahun, $laporanStockHarian->bulan, 1)->daysInMonth;
        return view('finance.detailLaporanStokHarian', compact('laporanStockHarian', 'inventori', 'kategori', 'colorMap', 'uom', 'jumlahHari'));
    }

    public function laporanPenjualanHarianFinance()
    {
        return view('finance.laporanPenjualanHarian');
    }
    public function laporanStokOpnameFinance()
    {
        return view('finance.laporanStokOpname');
    }

    public function pengaturan()
    {
        return view('finance.pengaturan');
    }
}
