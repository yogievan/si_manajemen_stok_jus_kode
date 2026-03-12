@extends('layout.dashboard')
@section('web_title', 'Finance Laporan Permintaan Bahan Baku')
@section('menu')
    @include('layout.menu.finance')
@endsection
@section('name_page', 'Validasi Formulir Permintaan Bahan Baku')
@section('content')
    <div>
        <div class="mb-6">
            <a href="{{ route('finance.laporanPermintaanBahanBaku') }}" class="group inline-flex items-center gap-2 text-gray-400 hover:text-red-600 transition">
                <i class="fas fa-arrow-left group-hover:text-red-600"></i>
                <span class="group-hover:text-red-600">
                    Kembali ke Halaman Laporan Permintaan Bahan Baku
                </span>
            </a>
        </div>
        <div class="text-[#565725] mb-4 flex gap-2">
            <div class="pb-2">Waktu Pengajuan Permintaan Bahan Baku : </div>
            <div class="font-bold">{{ \Carbon\Carbon::parse($permintaanBahanBaku->tgl_request)->translatedFormat('l, d F Y \P\u\k\u\l H:i') }} WIB</div>
        </div>
        <form action="{{ route('finance.laporanPermintaanBahanBaku.validasi.simpan', $permintaanBahanBaku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="w-full border border-gray-300 text-sm">
        <thead class="bg-[#565725] text-white">
            <tr>
                <th class="border p-2 w-[30px]">No</th>
                <th class="border p-2 w-[200px]">Nama Bahan Baku</th>
                <th class="border p-2 w-[70px]">Jumlah Permintaan</th>
                <th class="border p-2 w-[70px]">Sisa Stok</th>
                <th class="border p-2 w-[50px]">UOM</th>
                <th class="border p-2 w-[70px]">Keterangan Manager</th>
                <th class="border p-2 w-[100px]">Jumlah Disetujui</th>
                <th class="border p-2 w-[150px]">Status Finance</th>
                <th class="border p-2 w-[250px]">Keterangan Finance</th>
            </tr>
        </thead>
        <tbody id="items">
            @foreach ( $permintaanBahanBakuDetail as $no => $detail )
                <tr class="item-row text-[#565725]">
                    <td class="border text-center w-[50px]">{{++$no}}</td>
                    <td class="border p-2">
                        @foreach ($inventori as $item)
                            @if ($detail->id_inventori == $item->id)
                                <div>{{ $item->nama_barang }}</div>
                            @endif
                        @endforeach
                    </td>
                    <td class="border p-2 text-center">{{ $detail->qty_request }}</td>
                    @foreach ($inventori as $item)
                        @if ($detail->id_inventori == $item->id)
                            <td class="border p-2 text-center text-[12px] stok text-[#565725] w-[50px]">
                                {{ $item->stock }}
                            </td>
                            <td class="border p-2 text-center text-[12px] text-[#565725] w-[50px]">
                                {{ $item->uom->nama_uom }}
                            </td>
                        @endif
                    @endforeach
                    <td class="border p-2 text-center text-[#565725]">
                        {{ $detail->keterangan_manager }}
                    </td>
                    <td class="border p-2 text-center text-[#565725]">
                        <input type="number" name="qty_approve[]" value="{{ $detail->qty_approve }}" class="w-full text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" required>
                    </td>
                    <td class="border p-2 text-center text-[#565725]">
                        <select name="status_finance[]" class="w-full text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" required>
                            <option value="Approve" {{ $detail->status_finance == 'Approve' ? 'selected' : '' }}>Approve</option>
                            <option value="Reject" {{ $detail->status_finance == 'Reject' ? 'selected' : '' }}>Reject</option>
                        </select>
                    </td>
                    <td class="border p-2 text-center text-[#565725]">
                        <textarea name="keterangan_finance[]" rows="1" class="w-full text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" placeholder="(Opsional)" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'">{{ $detail->keterangan_finance }}</textarea>
                    </td>
                    <td>
                        <input type="hidden" name="id_detail[]" value="{{ $detail->id }}">
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
           <div class="mt-10">
                <button type="submit" class="bg-green-600 hover:bg-green-800 text-white px-6 py-2 rounded">
                    Simpan Validasi Pengajuan Permintaan Bahan Baku
                </button>
            </div>
        </form>
    </div>
@endsection