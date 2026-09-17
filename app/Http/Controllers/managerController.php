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
use App\Models\kedatanganBahanBaku;
use App\Models\kedatanganBahanBakuDetail;
use App\Models\laporanStokHarian;
use App\Models\laporanStokHarianDetail;
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
    public function detailLaporanPermintaanBahanBakuManager($id)
    {
        $uom = uom::all();
        $inventori = Inventori::with('uom')->get();
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($id);
        $permintaanBahanBakuDetail = permintaanBahanBakuDetail::where('id_laporan_permintaan', $id)->get();
        return view('manager.detailLaporanPermintaanBahanBaku', compact('permintaanBahanBaku', 'permintaanBahanBakuDetail', 'inventori', 'uom'));
    }
    public function tambahLaporanPermintaanBahanBakuManager()
    {
        $uom = uom::all();
        $inventori = Inventori::with('uom')->get();
        $permintaanBahanBaku = permintaanBahanBaku::orderBy('id', 'desc')->get();
        return view('manager.tambahLaporanPermintaanBahanBaku', compact('inventori', 'uom', 'permintaanBahanBaku'));
    }
    public function simpanTambahLaporanPermintaanBahanBakuManager(Request $request)
    {
        $request->validate([
            'tgl_request' => 'required',
            'id_inventori' => 'required|array',
            'qty_request' => 'required|array',
            'keterangan_manager' => 'required|array',
        ]);
        $tanggal = Carbon::parse($request->tgl_request)->setTimeFrom(Carbon::now());
        $laporanPermintaanBahanBaku = permintaanBahanBaku::create([
            'tgl_request' => $tanggal,
            'keterangan_manager' => $request->keterangan_manager,
        ]);
        foreach($request->id_inventori as $key => $inventori){
            permintaanBahanBakuDetail::create([
                'id_laporan_permintaan' => $laporanPermintaanBahanBaku->id,
                'id_inventori' => $inventori,
                'qty_request' => $request->qty_request[$key],
                'keterangan_manager' => $request->keterangan_manager[$key],
                'status_finance' => 'Pending',
            ]);
        }
        Alert::toast('Laporan Pengajuan Bahan Baku Berhasil di tambahakan!','success');
        return redirect()->route('manager.laporanPermintaanBahanBaku');
    }
    public function editLaporanPermintaanBahanBakuManager($id)
    {
        $uom = uom::all();
        $inventori = Inventori::with('uom')->get();
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($id);
        $permintaanBahanBakuDetail = permintaanBahanBakuDetail::where('id_laporan_permintaan', $id)->get();
        return view('manager.editLaporanPermintaanBahanBaku', compact('inventori', 'uom', 'permintaanBahanBaku', 'permintaanBahanBakuDetail'));
    }
    public function simpanEditLaporanPermintaanBahanBakuManager(Request $request, $id)
    {
        $request->validate([
            'tgl_request' => 'required',
            'id_inventori' => 'required|array',
            'qty_request' => 'required|array',
            'keterangan_manager' => 'required|array',
        ]);
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($id);
        $tanggal = Carbon::createFromFormat('d-m-Y', $request->tgl_request)->setTimeFrom(Carbon::now());
        $permintaanBahanBaku->update([
            'tgl_request' => $tanggal,
        ]);

        permintaanBahanBakuDetail::where('id_laporan_permintaan', $id)->delete();

        foreach ($request->id_inventori as $key => $inventori) {
            permintaanBahanBakuDetail::create([
                'id_laporan_permintaan' => $id,
                'id_inventori' => $inventori,
                'qty_request' => $request->qty_request[$key],
                'keterangan_manager' => $request->keterangan_manager[$key],
            ]);
        }
        Alert::toast('Pengajuan Bahan Baku Berhasil di rubah!','success');
        return redirect()->route('manager.laporanPermintaanBahanBaku');
    }

    public function hapusLaporanPermintaanBahanBakuManager($id)
    {
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($id);
        $permintaanBahanBaku->delete();
        Alert::toast('Laporan Pengajuan Bahan Baku Berhasil di hapus!','success');
        return redirect()->route('manager.laporanPermintaanBahanBaku');
    }

    public function laporanKedatanganBahanBakuManager()
    {
        $kedatanganBahanBaku = kedatanganBahanBaku::orderBy('id', 'desc')->get();
        $permintaanBahanBaku = permintaanBahanBaku::orderBy('id', 'desc')->where('approved_at', '!=', null)->get();
        return view('manager.laporanKedatanganBahanBaku',compact('permintaanBahanBaku', 'kedatanganBahanBaku'));
    }

    public function detailLaporanKedatanganBahanBakuManager($id)
    {
        $uom = uom::all();
        $inventori = Inventori::with('uom')->get();
        $kedatanganBahanBaku = kedatanganBahanBaku::findOrFail($id);
        $kedatanganBahanBakuDetail = kedatanganBahanBakuDetail::where('id_laporan_kedatangan', $id)->get();
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($kedatanganBahanBaku->id_request);
        $permintaanBahanBakuDetail = permintaanBahanBakuDetail::where('id_laporan_permintaan', $kedatanganBahanBaku->id_request)->get();
        return view('manager.detailLaporanKedatanganBahanBaku', compact('inventori', 'uom', 'kedatanganBahanBaku', 'kedatanganBahanBakuDetail', 'permintaanBahanBaku', 'permintaanBahanBakuDetail'));
    }

    public function tambahLaporanKedatanganBahanBakuManager($id)
    {
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($id);
        $inventori = Inventori::with('uom')->get();
        $permintaanBahanBakuDetail = permintaanBahanBakuDetail::where('id_laporan_permintaan', $id)->get();
        return view('manager.tambahLaporanKedatanganBahanBaku', compact('permintaanBahanBaku', 'permintaanBahanBakuDetail', 'inventori'));
    }
    public function simpanTambahLaporanKedatanganBahanBakuManager(Request $request, $id)
    {
        $request->validate([
            'id_inventori' => 'required|array',
            'qty_kedatangan' => 'nullable|array',
            'lampiran_kedatangan' => 'nullable|array',
            'keterangan_manager' => 'nullable|array',
            'tgl_kedatangan' => 'nullable|array',
            'tgl_kedatangan.*' => 'nullable|date',
        ]);
        $laporanKedatanganBahanBaku = kedatanganBahanBaku::create([
            'id_request' => $id,
        ]);
        foreach($request->id_inventori as $key => $inventori){
            kedatanganBahanBakuDetail::create([
                'id_laporan_kedatangan' => $laporanKedatanganBahanBaku->id,
                'id_inventori' => $inventori,
                'tgl_kedatangan' => !empty($request->tgl_kedatangan[$key]) ? Carbon::parse($request->tgl_kedatangan[$key])->setTimeFrom(Carbon::now()) : null,
                'qty_kedatangan' => $request->qty_kedatangan[$key] ?? 0,
                'lampiran_kedatangan' => $request->lampiran_kedatangan[$key] ?? null,
                'keterangan_manager' => $request->keterangan_manager[$key] ?? null,
                'status_finance' => 'Pending',
            ]);
        }
        Alert::toast('Laporan Kedatangan Bahan Baku Berhasil di tambahakan!','success');
        return redirect()->route('manager.laporanKedatanganBahanBaku');
    }

    public function editLaporanKedatanganBahanBakuManager($id)
    {
        $uom = uom::all();
        $inventori = Inventori::with('uom')->get();
        $kedatanganBahanBaku = kedatanganBahanBaku::findOrFail($id);
        $kedatanganBahanBakuDetail = kedatanganBahanBakuDetail::where('id_laporan_kedatangan', $id)->get();
        $permintaanBahanBaku = permintaanBahanBaku::findOrFail($kedatanganBahanBaku->id_request);
        $permintaanBahanBakuDetail = permintaanBahanBakuDetail::where('id_laporan_permintaan', $kedatanganBahanBaku->id_request)->get();
        return view('manager.editLaporanKedatanganBahanBaku', compact('inventori', 'uom', 'kedatanganBahanBaku', 'kedatanganBahanBakuDetail', 'permintaanBahanBaku', 'permintaanBahanBakuDetail'));
    }

    public function simpanEditLaporanKedatanganBahanBakuManager(Request $request, $id)
    {
        $request->validate([
            'id_inventori' => 'required|array',
            'qty_kedatangan' => 'nullable|array',
            'lampiran_kedatangan' => 'nullable|array',
            'keterangan_manager' => 'nullable|array',
            'tgl_kedatangan' => 'nullable|array',
            'tgl_kedatangan.*' => 'nullable|date',
        ]);

        $kedatanganBahanBaku = kedatanganBahanBaku::findOrFail($id);
        $detailLama = kedatanganBahanBakuDetail::where('id_laporan_kedatangan', $id)->get();
        foreach ($detailLama as $lama) {
            $inventoriLama = Inventori::find($lama->id_inventori);
            if ($inventoriLama) {
                $inventoriLama->stok -= $lama->qty_kedatangan;
                $inventoriLama->save();
            }
        }
        kedatanganBahanBakuDetail::where('id_laporan_kedatangan', $id)->delete();
        foreach($request->id_inventori as $key => $id_inv){
            $qty_baru = $request->qty_kedatangan[$key] ?? 0;

            kedatanganBahanBakuDetail::create([
                'id_laporan_kedatangan' => $id,
                'id_inventori' => $id_inv,
                'tgl_kedatangan' => !empty($request->tgl_kedatangan[$key]) ? Carbon::parse($request->tgl_kedatangan[$key])->setTimeFrom(Carbon::now()) : null,
                'qty_kedatangan' => $qty_baru,
                'lampiran_kedatangan' => $request->lampiran_kedatangan[$key] ?? null,
                'keterangan_manager' => $request->keterangan_manager[$key] ?? null,
                'status_finance' => 'Pending',
            ]);
            $inventoriBaru = Inventori::find($id_inv);
            if ($inventoriBaru) {
                $inventoriBaru->stok += $qty_baru;
                $inventoriBaru->save();
            }
        }

        Alert::toast('Laporan Kedatangan Bahan Baku Berhasil di rubah!','success');
        return redirect()->route('manager.laporanKedatanganBahanBaku', compact('kedatanganBahanBaku'));
    }

    public function hapusLaporanKedatanganBahanBakuManager($id)
    {
        $kedatanganBahanBaku = kedatanganBahanBaku::findOrFail($id);
        $kedatanganBahanBaku->delete();
        Alert::toast('Laporan Kedatangan Bahan Baku Berhasil di hapus!','success');
        return redirect()->route('manager.laporanKedatanganBahanBaku');
    }

    public function laporanStokHarianManager()
    {
        $laporanStokHarian = laporanStokHarian::orderBy('id', 'desc')->get();
        return view('manager.laporanStokHarian', compact('laporanStokHarian'));
    }
    public function detailLaporanStokHarianManager($id)
    {
        $laporanStokHarian = laporanStokHarian::findOrFail($id);
        $dataKedatangan = kedatanganBahanBakuDetail::all();

        $dataStok = laporanStokHarianDetail::from('detail_laporan_stok_harian as stok')
            ->join('inventori as inv', 'stok.id_inventori', '=', 'inv.id')
            ->leftJoin('detail_kedatangan_bahan_baku as datang', function($join) {
                $join->on('stok.id_inventori', '=', 'datang.id_inventori')
                    ->on('stok.tgl_masuk', '=', 'datang.tgl_kedatangan');
            })
           ->select(
                'stok.id',
                'stok.id_inventori',
                'stok.tgl_masuk',
                'stok.tgl_keluar',
                'inv.nama_barang',
                'stok.stok_awal',
                'stok.stok_masuk',
                'stok.stok_keluar',
                'stok.stok_akhir',
                'datang.qty_kedatangan',
                'datang.lampiran_kedatangan'
            )
            ->get();

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
        $jumlahHari = Carbon::createFromDate($laporanStokHarian->tahun, $laporanStokHarian->bulan, 1)->daysInMonth;

        return view('manager.detailLaporanStockHarian', compact('laporanStokHarian', 'inventori', 'kategori', 'colorMap', 'uom', 'jumlahHari', 'dataStok', 'dataKedatangan'));
    }
    public function tambahLaporanPengeluaranStokHarianManager($id)
    {
        $laporanStokHarian = laporanStokHarian::findOrFail($id);
        $inventori = Inventori::with('uom')->get();
        $uom = uom::all();
        return view('manager.tambahLaporanPengeluaranStokBahanBaku', compact('inventori', 'uom', 'laporanStokHarian'));
    }
    public function simpanTambahLaporanPengeluaranStokHarianManager(Request $request, $id)
    {
        $request->validate([
            'tgl_request' => 'required|date',
            'id_inventori' => 'required|array',
            'stok_keluar' => 'required|array',
        ]);

        foreach($request->id_inventori as $key => $id_inv){
            $qtyBaru = isset($request->stok_keluar[$key]) ? (float) $request->stok_keluar[$key] : 0;

            laporanStokHarianDetail::create([
                'id_laporan_stok_harian' => $id,
                'id_inventori' => $id_inv,
                'stok_keluar' => $qtyBaru,
                'tgl_keluar' => \Carbon\Carbon::parse($request->tgl_request)->format('Y-m-d'),
            ]);

            if ($qtyBaru > 0) {
                Inventori::where('id', $id_inv)->decrement('stok', $qtyBaru);
            }
        }

        Alert::toast('Laporan Pengeluaran Stok Harian Berhasil disimpan!','success');
        return redirect()->route('manager.laporanStokHarian.detail', ['id' => $id]);
    }

    public function laporanPenjualanHarianManager()
    {
        return view('manager.laporanPenjualanHarian');
    }

    public function laporanStokOpnameManager()
    {
        return view('manager.laporanStokOpname');
    }
}
