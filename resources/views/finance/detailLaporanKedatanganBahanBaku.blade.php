@extends('layout.dashboard')
@section('web_title', 'Finance Laporan Permintaan Bahan Baku')
@section('menu')
    @include('layout.menu.finance')
@endsection
@section('name_page', 'Detail Formulir Permintaan Bahan Baku')
@section('content')
    <div>
        <div class="mb-6">
            <a href="{{ route('finance.laporanKedatanganBahanBaku') }}" class="group inline-flex items-center gap-2 text-gray-400 hover:text-red-600 transition">
                <i class="fas fa-arrow-left group-hover:text-red-600"></i>
                <span class="group-hover:text-red-600 text-xl font-bold">
                    Kembali ke Halaman Sebelumnya
                </span>
            </a>
        </div>
        <div class="text-[#565725] mb-10">
            <div><b>Request Order :</b> {{ \Carbon\Carbon::parse($permintaanBahanBaku->tgl_request)->translatedFormat('l, d F Y \P\u\k\u\l H:i') }} WIB</div>
            <div><b>Approve Time:</b> {{ $permintaanBahanBaku->approved_at ? \Carbon\Carbon::parse($permintaanBahanBaku->approved_at)->translatedFormat('l, d F Y \P\u\k\u\l H:i') . ' WIB' : '-'}}</div>
        </div>
        <table class="w-full border border-gray-300 text-sm">
            <thead class="bg-[#565725] text-white">
                <tr>
                    <th class="border p-2 w-[20px]">No</th>
                    <th class="border p-2 w-[200px]">Nama Bahan Baku</th>
                    <th class="border p-2 w-[20px]">Disetujui</th>
                    <th class="border p-2 w-[100px]">Tanggal Kedatangan</th>
                    <th class="border p-2 w-[20px]">Jumlah Kedatangan</th>
                    <th class="border p-2 w-[20px]">UOM</th>
                    <th class="border p-2 w-[100px]">Link Invoice/SJ</th>
                    <th class="border p-2 w-[100px]">Keterangan Manager</th>
                    <th class="border p-2 w-[100px]">Status Finance</th>
                    <th class="border p-2 w-[100px]">Confirm Finance</th>
                </tr>
            </thead>
            <tbody id="items">
                @foreach ( $kedatanganBahanBakuDetail as $no => $detail )
                    @php
                        $item = $inventori->firstWhere('id', $detail->id_inventori);
                        $reqDetail = $permintaanBahanBakuDetail->firstWhere('id_inventori', $detail->id_inventori);
                    @endphp
                    <tr class="item-row text-[#565725] text-center">
                        <td class="border text-center w-[20px]">{{++$no}}</td>
                        <td class="border p-2 w-[200px]">
                            {{ $item->nama_barang }}
                        </td>
                        <td class="border p-2 w-[20px]">
                            {{ $reqDetail->qty_approve }}
                        </td>
                        <td class="border p-2 w-[50px]">
                            {{ $detail->tgl_kedatangan ? \Carbon\Carbon::parse($detail->tgl_kedatangan)->translatedFormat('l, d F Y') : '-' }}
                        </td>
                        <td class="border p-2 w-[20px]">
                            {{ $detail->qty_kedatangan ?? '-' }}
                        </td>
                        <td class="border p-2 text-center text-[#565725] w-[20px]">
                            {{ $item->uom->nama_uom }}
                        </td>
                        <td class="border p-2 w-[150px]">
                            <a href="{{ $detail->lampiran_kedatangan }}" target="_blank" class="text-blue-600">
                                Lihat Lampiran <i class="fas fa-external-link-alt"></i>
                            </a>
                        </td>
                        <td class="border p-2 w-[150px]">
                            {{ $detail->keterangan_manager ?? '-' }}
                        </td>
                        <td class="border p-2 w-[150px]">
                            {{ $detail->status_finance ?? '-' }}
                        </td>
                        <td class="border p-2 w-[150px]">
                            {{ $detail->confirm_finance ?? '-' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection