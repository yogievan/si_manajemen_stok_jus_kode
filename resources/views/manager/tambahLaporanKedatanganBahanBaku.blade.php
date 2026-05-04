@extends('layout.dashboard')
@section('web_title', 'Manager Laporan Kedatangan Bahan Baku')
@section('menu')
    @include('layout.menu.manager')
@endsection
@section('name_page', 'Formulir Kedatangan Bahan Baku')
@section('content')
    <div>
        <div class="mb-6">
            <a href="{{ route('manager.laporanKedatanganBahanBaku') }}" class="group inline-flex items-center gap-2 text-gray-400 hover:text-red-600 transition">
                <i class="fas fa-arrow-left group-hover:text-red-600"></i>
                <span class="group-hover:text-red-600">
                    Kembali ke Halaman Laporan Kedatangan Bahan Baku
                </span>
            </a>
        </div>

        <form action="{{ route('manager.laporanKedatanganBahanBaku.simpan', $permintaanBahanBaku->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="text-[#565725] mb-4">
                <table class="w-full border border-gray-300 text-sm mt-4">
                    <thead class="bg-[#565725] text-white">
                       <tr>
                            <th class="border p-2 w-[20px]">No</th>
                            <th class="border p-2 w-[200px]">Nama Bahan Baku</th>
                            <th class="border p-2 w-[20px]">Permintaan</th>
                            <th class="border p-2 w-[50px]">Tanggal Kedatangan</th>
                            <th class="border p-2 w-[20px]">Jumlah Kedatangan</th>
                            <th class="border p-2 w-[20px]">UOM</th>
                            <th class="border p-2 w-[150px]">Link Invoice</th>
                            <th class="border p-2 w-[150px]">Keterangan Manager</th>
                        </tr>
                    </thead>
                    <tbody id="items">
                        @foreach ( $permintaanBahanBakuDetail as $no => $detail )
                            <tr class="item-row text-[#565725] text-center">
                                <td class="border text-center w-[20px]">{{++$no}}</td>
                                @foreach ($inventori as $item)
                                    @if ($detail->id_inventori == $item->id)
                                    <td class="border p-2 w-[200px]">
                                        <select name="id_inventori[]" class="select-bahan w-full text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" required onchange="updateUOM(this)" readonly>
                                            @foreach ($inventori as $item)
                                                @if ($detail->id_inventori == $item->id)
                                                    <option selected value="{{ $item->id }}" data-uom="{{ $item->uom->nama_uom }}">
                                                        {{ $item->nama_barang }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border p-2 w-[20px]">
                                        {{ $detail->qty_request }}
                                    </td>
                                    <td class="border p-2 w-[20px]">
                                        <div class="relative max-w-sm">
                                            <input autocomplete="off" value="" id="date" name="tgl_kedatangan[]" type="text" placeholder=""  class="w-full text-sm border rounded-lg px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                                            
                                            <svg class="w-5 h-5 absolute right-2 top-2.5 text-gray-400"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7H4v11a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="border p-2 w-[20px]">
                                        <input type="number" name="qty_kedatangan[]" class="w-full text-sm text-[#565725] p-2 border rounded focus:ring-green-500 focus:border-green-500">
                                    </td>
                                    <td class="border p-2 text-center text-[#565725] w-[20px]">
                                        {{ $item->uom->nama_uom }}
                                    </td>
                                    <td class="border p-2 w-[150px]">
                                        <input type="text" name="lampiran_kedatangan[]" class="w-full text-sm text-[#565725] p-2 border rounded focus:ring-green-500 focus:border-green-500">
                                    </td>
                                    <td class="border p-2 w-[150px]">
                                        <input type="text" name="keterangan_manager[]" class="w-full text-sm text-[#565725] p-2 border rounded focus:ring-green-500 focus:border-green-500">
                                    </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-10">
                    <button type="submit" class="bg-green-600 hover:bg-green-800 text-white px-6 py-2 rounded">
                        Simpan Pengajuan Kedatangan Bahan Baku
                    </button>
                </div>
            </div>
        </form> 
    </div>
@endsection