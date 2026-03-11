@extends('layout.dashboard')
@section('web_title', 'Manager Laporan Permintaan Bahan Baku')
@section('menu')
    @include('layout.menu.manager')
@endsection
@section('name_page', 'Detail Formulir Permintaan Bahan Baku')
@section('content')
    <div>
        <div class="mb-6">
            <a href="{{ route('manager.laporanPermintaanBahanBaku') }}" class="group inline-flex items-center gap-2 text-gray-400 hover:text-red-600 transition">
                <i class="fas fa-arrow-left group-hover:text-red-600"></i>
                <span class="group-hover:text-red-600">
                    Kembali ke Halaman Laporan Permintaan Bahan Baku
                </span>
            </a>
        </div>
        <div class="text-[#565725] mb-4 flex gap-2">
            <div class="pb-2">Waktu Pengajuan Permintaan Bahan Baku : </div>
            <div class="font-bold">{{ \Carbon\Carbon::parse($permintaanBahanBaku->tgl_request)->translatedFormat('d F Y \P\u\k\u\l H:i') }} WIB</div>
        </div>

        <table class="w-full border border-gray-300 text-sm">
        <thead class="bg-[#565725] text-white">
            <tr>
                <th class="border p-2 w-[50px]">No</th>
                <th class="border p-2 w-[150px]">Nama Bahan Baku</th>
                <th class="border p-2 w-[50px]">Jumlah Permintaan</th>
                <th class="border p-2 w-[50px]">Sisa stok</th>
                <th class="border p-2 w-[50px]">Jumlah Disetujui</th>
                <th class="border p-2 w-[50px]">UOM</th>
                <th class="border p-2 w-[100px]">Keterangan Manager</th>
                <th class="border p-2 w-[50px]">Status Purchasing</th>
                <th class="border p-2 w-[100px]">Keterangan Purchasing</th>
                <th class="border p-2 w-[50px]">Approve time</th>

            </tr>
        </thead>
        <tbody id="items" class="text-center">
            @foreach ( $permintaanBahanBakuDetail as $no => $detail )
                <tr class="item-row text-[#565725]">
                    <td class="border text-center w-[50px]">{{++$no}}</td>
                    <td class="border p-2 w-[150px]">
                        @foreach ($inventori as $item)
                            @if ($detail->id_inventori == $item->id)
                               {{ $item->nama_barang }}
                            @endif
                        @endforeach
                    </td>
                    <td class="border p-2 w-[50px]">
                        {{ $detail->qty_request }}
                    </td>
                    <td class="border p-2 w-[50px]">
                        {{ $item->stock }}
                    </td>
                    <td class="border p-2 w-[50px]">
                        {{ $detail->qty_approve }}
                    </td>
                    @foreach ($inventori as $item)
                        @if ($detail->id_inventori == $item->id)
                            <td class="border p-2 text-center text-[#565725] w-[50px]">
                                {{ $item->uom->nama_uom }}
                            </td>
                        @endif
                    @endforeach
                    <td class="border p-2 w-[100px]">
                        {{ $permintaanBahanBaku->keterangan_manager }}
                    </td>
                    <td class="border p-2 w-[50px]">
                        {{ $permintaanBahanBaku->status_finance }}
                    </td>
                    <td class="border p-2 w-[100px]">
                        {{ $permintaanBahanBaku->keterangan_finance }}
                    </td>
                    <td class="border p-2 w-[50px]">
                        {{ $permintaanBahanBaku->approve_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection
@push('scripts')
<script>
    function tambahItem(){
        const table = document.getElementById('items');
        const row = document.createElement('tr');
        row.classList.add('item-row');
        row.innerHTML = `
            <td class="border text-center nomor text-[#565725]"></td>
            <td class="border p-2 text-[#565725]">
                <select name="id_inventori[]" class="select-bahan w-full text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" required onchange="updateUOM(this)">
                    <option value="">Pilih Bahan Baku</option>
                    @foreach ($inventori as $item)
                        <option value="{{ $item->id }}" data-uom="{{ $item->uom->nama_uom }}">
                                {{ $item->nama_barang }}
                            </option>
                    @endforeach
                </select>
            </td>
            <td class="border p-2 text-[#565725]">
                <input type="number" name="qty_request[]" class="w-[150px] text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" required>
            </td>
            <td class="border p-2 text-center uom text-[#565725]">-</td>
            <td class="border text-center">
                <button type="button" class="bg-red-500 text-white px-3 py-1 rounded" onclick="hapusItem(this)">Hapus</button>
            </td> 
            `;
        table.appendChild(row);
        updateNomor();
    }
    function hapusItem(button){
        const row = button.closest('tr');
        row.remove();
        updateNomor();
    }

    function updateNomor(){
        const rows = document.querySelectorAll('#items .item-row');
            rows.forEach((row,index)=>{
            row.querySelector('.nomor').innerText = index+1;
        });
    }

    function updateUOM(select){
        const selectedOption = select.options[select.selectedIndex];
        const uom = selectedOption.getAttribute("data-uom");
        const row = select.closest("tr");
        const uomCell = row.querySelector(".uom");
        if(uom){
            uomCell.innerText = uom;
        }else{
            uomCell.innerText = "-";
        }
    }
</script>
@endpush