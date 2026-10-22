@extends('layout.dashboard')
@section('web_title', 'Manager Laporan stok Harian')
@section('menu')
    @include('layout.menu.manager')
@endsection
@section('name_page', 'Detail Laporan stok Harian (Stock In/Out)')
@section('content')
<div>
    <div class="mb-6">
        <a href="{{ route('manager.laporanStokHarian') }}" class="group inline-flex items-center gap-2 text-gray-400 hover:text-red-600 transition">
            <i class="fas fa-arrow-left group-hover:text-red-600"></i>
            <span class="group-hover:text-red-600 text-xl font-bold">
                Kembali ke Halaman Sebelumnya
            </span>
        </a>
    </div>
    <div class="mb-4 flex gap-5">
        <a href="{{ route('manager.laporanStokPengeluaranHarianBahanBaku.tambah', $laporanStokHarian->id) }}">
            <button class="bg-green-600 hover:bg-green-800 p-2 rounded-md text-white">
                <i class="fas fa-plus-circle text-[16px]"></i> Buat Laporan Pengeluaran Stok Harian <b>BAHAN BAKU</b>
            </button>
        </a>

        <a href="{{ route('manager.laporanStokPengeluaranHarianBuah.tambah', $laporanStokHarian->id) }}">
            <button class="bg-green-600 hover:bg-green-800 p-2 rounded-md text-white">
                <i class="fas fa-plus-circle text-[16px]"></i> Buat Laporan Pengeluaran Stok Harian <b>BUAH</b>
            </button>
        </a>
    </div>

    <div class="relative max-h-[80vh] overflow-x-auto overflow-y-auto custom-scrollbar border border-gray-400 shadow-md bg-white">
        <table class="w-full text-xs text-left border-collapse whitespace-nowrap">
            <thead class="sticky top-0 z-30 bg-[#565725] text-white">
                <tr>
                    <th rowspan="3" class="sticky left-0 z-40 bg-[#565725] border border-gray-400 p-2 text-center w-[40px] min-w-[40px]">No</th>
                    <th rowspan="3" class="sticky left-[40px] z-40 bg-[#565725] border border-gray-400 p-2 text-center w-[160px] min-w-[160px]">Nama Bahan Baku</th>
                    <th rowspan="3" class="border border-gray-400 p-2 text-center w-[120px] min-w-[120px]">Kategori</th>
                    <th rowspan="3" class="border border-gray-400 p-2 text-center w-[90px] min-w-[90px]">Sisa Stok</th>
                    <th rowspan="3" class="border border-gray-400 p-2 text-center w-[80px] min-w-[80px]">Uom</th>

                    @for ($i = 1; $i <= $jumlahHari; $i++)
                        <th colspan="2" class="border border-gray-400 p-1 text-center font-bold w-[100px]">
                            {{ $i }}
                            {{ \Carbon\Carbon::createFromDate($laporanStokHarian->tahun, $laporanStokHarian->bulan, $i)->translatedFormat('M') }}
                        </th>
                    @endfor
                </tr>
                <tr>
                    @for ($i = 1; $i <= $jumlahHari; $i++)
                        @php
                            $tanggalEdit = \Carbon\Carbon::createFromDate($laporanStokHarian->tahun, $laporanStokHarian->bulan, $i)->format('Y-m-d');
                            $adaPengeluaranHariIni = collect($dataStok)->contains(function($s) use ($tanggalEdit) {
                                if (!$s->tgl_keluar) return false;
                                return \Carbon\Carbon::parse($s->tgl_keluar)->format('Y-m-d') == $tanggalEdit;
                            });
                        @endphp

                        <th colspan="2" class="border border-gray-400 p-1 text-center w-[100px]">
                            @if($adaPengeluaranHariIni)
                                <div class="flex gap-2">
                                    <a href="{{ route('manager.laporanStokPengeluaranHarianBahanBaku.edit', ['id' => $laporanStokHarian->id, 'tanggal' => $tanggalEdit]) }}" class="w-full bg-yellow-400 hover:bg-yellow-500 p-2 rounded-md text-white flex flex-col items-center justify-center cursor-pointer leading-tight text-xs">
                                        <span>Edit</span>
                                        <span class="font-bold">B. BAKU</span>
                                    </a>

                                    <a href="{{ route('manager.laporanStokPengeluaranHarianBuah.edit', ['id' => $laporanStokHarian->id, 'tanggal' => $tanggalEdit]) }}" class="w-full bg-yellow-400 hover:bg-yellow-500 p-2 rounded-md text-white flex flex-col items-center justify-center cursor-pointer leading-tight text-xs">
                                        <span>Edit</span>
                                        <span class="font-bold">BUAH</span>
                                    </a>
                                </div>
                            @else
                                <span class="inline-block text-gray-300 font-normal">-</span>
                            @endif
                        </th>
                    @endfor
                </tr>
                <tr>
                    @for ($i = 1; $i <= $jumlahHari; $i++)
                        <th class="border border-gray-400 py-2 px-3.5 text-center bg-green-100 text-green-800 w-[50px]">IN</th>
                        <th class="border border-gray-400 p-2 text-center bg-red-100 text-red-800 w-[50px]">OUT</th>
                    @endfor
                </tr>
            </thead>

            <tbody>
                @foreach ($inventori as $no => $item)
                <tr class="hover:bg-gray-100">
                    <td class="sticky left-0 z-20 border border-gray-300 p-1.5 text-center bg-white w-[40px]">
                        {{++$no}}
                    </td>
                    <td class="sticky left-[40px] z-20 border border-gray-300 p-1.5 bg-white w-[160px] truncate">
                        {{ $item->nama_barang }}
                    </td>

                    @php
                        $kat = $kategori->firstWhere('id', $item->id_kategori);
                        $warna = $colorMap[$item->id_kategori] ?? 'bg-gray-100';
                    @endphp
                    <td class="border border-gray-300 p-1.5 text-center {{ $warna }} text-black w-[120px]">
                        {{ $kat->nama_kategori ?? '-' }}
                    </td>
                    @php
                        $transaksiTerakhir = collect($dataStok)
                            ->where('id_inventori', $item->id)
                            ->sortByDesc('id')
                            ->first();

                        if ($transaksiTerakhir && $transaksiTerakhir->stok_akhir !== null) {
                            $sisaStok = $transaksiTerakhir->stok_akhir;
                        } else {
                            $sisaStok = $item->stok;
                        }
                    @endphp

                    <td class="border border-gray-300 p-1.5 text-center w-[90px] font-bold">
                        {{ $sisaStok }}
                    </td>
                    <td class="border border-gray-300 p-1.5 text-center bg-gray-50 w-[80px]">
                        {{ optional($uom->firstWhere('id', $item->id_uom))->nama_uom }}
                    </td>

                    @for ($i = 1; $i <= $jumlahHari; $i++)
                        @php
                            $tanggalLoop = \Carbon\Carbon::createFromDate($laporanStokHarian->tahun, $laporanStokHarian->bulan, $i)->format('Y-m-d');
                            $kedatangan = collect($dataKedatangan)->filter(function($k) use ($item, $tanggalLoop) {
                                return $k->id_inventori == $item->id &&
                                       $k->tgl_kedatangan &&
                                       \Carbon\Carbon::parse($k->tgl_kedatangan)->format('Y-m-d') == $tanggalLoop;
                            })->sum('qty_kedatangan');

                            $stokMasuk = collect($dataStok)->filter(function($s) use ($item, $tanggalLoop) {
                                return $s->id_inventori == $item->id &&
                                       $s->tgl_masuk &&
                                       \Carbon\Carbon::parse($s->tgl_masuk)->format('Y-m-d') == $tanggalLoop;
                            })->sum('stok_masuk');

                            $in = $kedatangan > 0 ? $kedatangan : $stokMasuk;
                            $dataOut = collect($dataStok)->filter(function($s) use ($item, $tanggalLoop) {
                                return $s->id_inventori == $item->id &&
                                       $s->tgl_keluar &&
                                       \Carbon\Carbon::parse($s->tgl_keluar)->format('Y-m-d') == $tanggalLoop;
                            });

                            $out = $dataOut->sum('stok_keluar') + $dataOut->sum('buah_susut') + $dataOut->sum('keluar_buah_utuh');
                            $kat = $kategori->firstWhere('id', $item->id_kategori);
                            $warna = $colorMap[$item->id_kategori] ?? 'bg-gray-100';
                            $namaUom = strtolower(optional($uom->firstWhere('id', $item->id_uom))->nama_uom);
                            $desimal = ($namaUom == 'kg') ? 2 : 0;
                        @endphp

                        <td class="border border-gray-300 p-1.5 text-center w-[50px] {{ $in > 0 ? 'text-green-800 bg-green-100' : 'bg-white text-gray-400' }}">
                            {{ $in > 0 ? number_format($in, $desimal) : '-' }}
                        </td>
                        <td class="border border-gray-300 p-1.5 text-center w-[50px] {{ $out > 0 ? 'text-red-800 bg-red-100' : 'bg-gray-100 text-gray-400' }}">
                            {{ $out > 0 ? number_format($out, $desimal) : '-' }}
                        </td>
                    @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
