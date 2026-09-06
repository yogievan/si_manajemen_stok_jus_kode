@extends('layout.dashboard')
@section('web_title', 'Finance Laporan Kedatangan Bahan Baku')
@section('menu')
    @include('layout.menu.finance')
@endsection
@section('name_page', 'Validasi Formulir Kedatangan Bahan Baku')
@section('content')
    <div>
        <div class="mb-6">
            <a href="{{ route('finance.laporanKedatanganBahanBaku') }}" class="group inline-flex items-center gap-2 text-gray-400 hover:text-red-600 transition">
                <i class="fas fa-arrow-left group-hover:text-red-600"></i>
                <span class="group-hover:text-red-600 text-xl font-bold">
                    Kembali ke Halaman Laporan Kedatangan Bahan Baku
                </span>
            </a>
        </div>
        <div class="text-[#565725]">
            <div><b>Request Order :</b> {{ \Carbon\Carbon::parse($permintaanBahanBaku->tgl_request)->translatedFormat('l, d F Y \P\u\k\u\l H:i') }} WIB</div>
            <div><b>Approve Time:</b> {{ $permintaanBahanBaku->approved_at ? \Carbon\Carbon::parse($permintaanBahanBaku->approved_at)->translatedFormat('l, d F Y \P\u\k\u\l H:i') . ' WIB' : '-'}}</div>
        </div>
        <form action="{{ route('finance.laporanKedatanganBahanBaku.validasi.simpan', $kedatanganBahanBaku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="w-full border border-gray-300 text-sm">
        <thead class="bg-[#565725] text-white">
            <tr>
                <th class="border p-2 w-[20px]">No</th>
                <th class="border p-2 w-[200px]">Nama Bahan Baku</th>
                <th class="border p-2 w-[20px]">Disetujui</th>
                <th class="border p-2 w-[50px]">Tanggal Kedatangan</th>
                <th class="border p-2 w-[20px]">Jumlah Kedatangan</th>
                <th class="border p-2 w-[20px]">UOM</th>
                <th class="border p-2 w-[150px]">Link Invoice</th>
                <th class="border p-2 w-[150px]">Keterangan Manager</th>
                <th class="border p-2 w-[100px]">Status Finance</th>
                <th class="border p-2 w-[100px]">Keterangan Finance</th>
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
                    <td class="border p-2 w-[100px]">
                        <select name="status_finance[]" class="w-full text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" required>
                            <option value="Approve" {{ $detail->status_finance == 'Approve' ? 'selected' : '' }}>Approve</option>
                            <option value="Reject" {{ $detail->status_finance == 'Reject' ? 'selected' : '' }}>Reject</option>
                        </select>
                    </td>
                    <td class="border p-2 w-[100px]">
                        <textarea name="confirm_finance[]" rows="1" class="w-full text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" placeholder="(Opsional)" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'">{{ $detail->confirm_finance }}</textarea>
                    </td>
                    <td hidden>
                        <input type="hidden" name="id_detail[]" value="{{ $detail->id }}">
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
           <div class="mt-10">
                <button type="submit" class="bg-green-600 hover:bg-green-800 text-white px-6 py-2 rounded">
                    Validasi Laporan Kedatangan Bahan Baku
                </button>
            </div>
        </form>
    </div>
@endsection