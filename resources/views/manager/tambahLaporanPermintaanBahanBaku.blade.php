@extends('layout.dashboard')
@section('web_title', 'Manager Laporan Permintaan Bahan Baku')
@section('menu')
    @include('layout.menu.manager')
@endsection
@section('name_page', 'Formulir Permintaan Bahan Baku')
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
        <form action="#" method="POST">
        @csrf
        <div class="text-[#565725] font-semibold mb-4">
            <div class="pb-2"> Tanggal Pengajuan Permintaan Bahan Baku</div>
            <div class="relative max-w-sm">
                <input id="date" name="tgl_request" type="text" placeholder="Pilih tanggal"  class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                
                <svg class="w-5 h-5 absolute right-3 top-2.5 text-gray-400"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7H4v11a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>

        <table class="w-full border border-gray-300 text-sm">
        <thead class="bg-[#565725] text-white">
            <tr>
                <th class="border p-2 w-[50px]">No</th>
                <th class="border p-2">Nama Bahan Baku</th>
                <th class="border p-2 w-[150px]">Jumlah</th>
                <th class="border p-2 w-[50px]">UOM</th>
                <th class="border p-2 w-[100px]">Aksi</th>
            </tr>
        </thead>
        <tbody id="items">
            <tr class="item-row text-[#565725]">
                <td class="border text-center nomor">1</td>
                <td class="border p-2">
                    <select name="id_inventori[]" class="select-bahan w-full p-2 border rounded focus:ring-green-500 focus:border-green-500" required onchange="updateUOM(this)">
                        <option value="">Pilih Bahan Baku</option>
                        @foreach ($inventori as $item)
                            <option value="{{ $item->id }}" data-uom="{{ $item->uom->nama_uom }}">
                                {{ $item->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td class="border p-2">
                    <input type="number" name="qty_request[]" class="w-[150px] p-2 border rounded focus:ring-green-500 focus:border-green-500" required>
                </td>
                <td class="border p-2 text-center uom text-[#565725] w-[50px]">-</td>
                <td class="border text-center w-[100px]">
                    <button type="button" class="bg-red-500 text-white px-3 py-1 rounded" onclick="hapusItem(this)">Hapus</button>
                </td>
            </tr>
        </tbody>
        </table>
            <button type="button" onclick="tambahItem()" class="mt-3 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800"> + Tambah Barang</button>

            <div class="mt-4 text-[#565725]">
                <div class="pb-2 font-semibold"> Keterangan Manager</div>
                <textarea name="catatan" id="" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Catatan (Opsional)"></textarea>
            </div>

           <div class="mt-4">
                <button type="submit" class="bg-green-600 hover:bg-green-800 text-white px-6 py-2 rounded">
                    Simpan Pengajuan Permintaan Bahan Baku
                </button>
            </div>
        </form>
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
                <select name="id_inventori[]" class="select-bahan w-full p-2 border rounded focus:ring-green-500 focus:border-green-500" required onchange="updateUOM(this)">
                    <option value="">Pilih Bahan Baku</option>
                    @foreach ($inventori as $item)
                        <option value="{{ $item->id }}" data-uom="{{ $item->uom->nama_uom }}">
                                {{ $item->nama_barang }}
                            </option>
                    @endforeach
                </select>
            </td>
            <td class="border p-2 text-[#565725]">
                <input type="number" name="qty_request[]" class="w-full p-2 border rounded focus:ring-green-500 focus:border-green-500" required>
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