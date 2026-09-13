@extends('layout.dashboard')
@section('web_title', 'Finance Laporan stok Harian')
@section('menu')
    @include('layout.menu.finance')
@endsection
@section('name_page', 'Detail Laporan stok Harian (Stock In/Out) Periode ' . \Carbon\Carbon::createFromFormat('!m', $laporanStokHarian->bulan)->translatedFormat('F') . ' - ' . $laporanStokHarian->tahun)
@section('content')
<div>
    <div class="mb-6">
        <a href="{{ route('finance.laporanStokHarian') }}" class="group inline-flex items-center gap-2 text-gray-400 hover:text-red-600 transition">
            <i class="fas fa-arrow-left group-hover:text-red-600"></i>
            <span class="group-hover:text-red-600 text-xl font-bold">
                Kembali ke Halaman Sebelumnya
            </span>
        </a>
    </div>
    <div class="relative max-h-[80vh] overflow-x-auto overflow-y-auto custom-scrollbar border border-gray-400 shadow-md bg-white">
        <table class="w-full text-xs text-left border-collapse whitespace-nowrap">
            <thead class="sticky top-0 z-30 bg-[#565725] text-white">
                <tr>
                    <th rowspan="2" class="sticky left-0 z-40 bg-[#565725] border border-gray-400 p-2 text-center w-[40px] min-w-[40px]">No</th>
                    <th rowspan="2" class="sticky left-[40px] z-40 bg-[#565725] border border-gray-400 p-2 text-center w-[160px] min-w-[160px]">Nama Bahan Baku</th>
                    <th rowspan="2" class="border border-gray-400 p-2 text-center w-[120px] min-w-[120px]">Kategori</th>
                    <th rowspan="2" class="border border-gray-400 p-2 text-center w-[90px] min-w-[90px]">Sisa Stok</th>
                    <th rowspan="2" class="border border-gray-400 p-2 text-center w-[80px] min-w-[80px]">Uom</th>

                    @for ($i = 1; $i <= $jumlahHari; $i++)
                        <th colspan="2" class="border border-gray-400 p-1 text-center font-bold w-[100px]">
                            {{ $i }}
                            {{ \Carbon\Carbon::createFromDate($laporanStokHarian->tahun, $laporanStokHarian->bulan, $i)->translatedFormat('M') }}
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
                    <td class="border border-gray-300 p-1.5 text-center w-[90px]">
                        {{ $item->stok }}
                    </td>
                    <td class="border border-gray-300 p-1.5 text-center bg-gray-50 w-[80px]">
                        {{ optional($uom->firstWhere('id', $item->id_uom))->nama_uom }}
                    </td>

                    @for ($i = 1; $i <= $jumlahHari; $i++)
                        <td class="border border-gray-300 p-1.5 text-center text-green-800 bg-green-100 w-[52px]">1</td>
                        <td class="border border-gray-300 p-1.5 text-center text-red-800 bg-red-100 w-[48px]">4</td>
                    @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
