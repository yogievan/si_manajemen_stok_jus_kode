@extends('layout.dashboard')
@section('web_title', 'Manager Laporan Pengeluaran Stok Bahan Baku')
@section('menu')
    @include('layout.menu.manager')
@endsection
@section('name_page', 'Formulir Pengeluaran Stok Harian Bahan Baku')
@section('content')
<div>
    <div class="mb-6">
        <a href="{{ url()->previous() }}" class="group inline-flex items-center gap-2 text-gray-400 hover:text-red-600 transition">
            <i class="fas fa-arrow-left group-hover:text-red-600"></i>
            <span class="group-hover:text-red-600 text-xl font-bold">
                Kembali ke Halaman Sebelumnya
            </span>
        </a>
    </div>

    <form action="{{ route('manager.laporanStokPengeluaranHarianBahanBaku.simpan', $laporanStokHarian->id) }}" method="POST">
        @csrf
        <div class="text-[#565725] my-4">
            <div class="pb-2 font-semibold"> Tanggal Pengeluaran Bahan Baku</div>
            <div class="relative max-w-sm">
                <input autocomplete="off" value="" id="date" name="tgl_keluar" type="text" placeholder="Pilih tanggal"  class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                required>

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
                    <th class="border p-2 w-max-[50px]">No</th>
                    <th class="border p-2 w-[80%]">Nama Bahan Baku</th>
                    <th class="border p-2 w-[100px]">Jumlah Pengeluaran Harian</th>
                    <th class="border p-2 w-[50px]">UOM</th>
                    <th class="border p-2 w-[50px]">Aksi</th>
                </tr>
            </thead>
            <tbody id="items">
                <tr class="item-row text-[#565725]">
                    <td class="border text-center nomor w-[30px] text-[#565725]">1</td>
                    <td class="border p-2 text-[#565725]">
                        <select name="id_inventori[]" class="select-bahan w-full text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" required onchange="updateUOM(this); updateStok(this)">
                            <option value="" selected disabled>Pilih Bahan Baku</option>
                            @foreach ($inventori as $item)
                                <option value="{{ $item->id }}" data-uom="{{ $item->uom->nama_uom }}" data-stok="{{ $item->stok }}">
                                    {{ $item->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td class="border p-2">
                        <input autocomplete="off" type="number" step="any" name="stok_keluar[]" class="w-full text-sm text-[#565725] p-2 border rounded focus:ring-green-500 focus:border-green-500" required>
                    </td>
                    <td class="border p-2 text-center text-[12px] uom text-[#565725] w-[50px]">-</td>
                    <td class="border text-center">
                        <button type="button" class="bg-red-500 text-white px-3 py-1 rounded text-center" onclick="hapusItem(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="button" onclick="tambahItem()" class="mt-3 mb-10 bg-white text-blue-600 px-4 py-2 rounded border border-blue-600 hover:bg-blue-800 hover:text-white"> + Tambah Bahan Baku</button>
        <div class="mt-5">
            <button type="submit" class="bg-green-600 hover:bg-green-800 text-white px-6 py-2 rounded">
                Simpan Laporan Pengeluaran Bahan Baku
            </button>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script>
    function initSelect2(element) {
        $(element).select2({
            placeholder: "Pilih Bahan Baku",
            allowClear: true,
            focus: true,
            width: '100%'
        }).on('select2:select', function (e) {
            updateUOM(this);
            updateStok(this);
        }).on('select2:open', function (e) {
        document.querySelector('.select2-container--open .select2-search__field').focus();
    });
    }
    $(document).ready(function() {
        initSelect2('.select-bahan');
    });

    function tambahItem(){
        const table = document.getElementById('items');
        const row = document.createElement('tr');
        row.classList.add('item-row', 'text-[#565725]');

        row.innerHTML = `
            <td class="border text-center nomor w-[30px] text-[#565725]">1</td>
            <td class="border p-2 text-[#565725]">
                <select name="id_inventori[]" class="select-bahan w-full text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" required onchange="updateUOM(this); updateStok(this)">
                    <option value="" selected disabled>Pilih Bahan Baku</option>
                    @foreach ($inventori as $item)
                        <option value="{{ $item->id }}" data-uom="{{ $item->uom->nama_uom }}" data-stok="{{ $item->stok }}">
                            {{ $item->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td class="border p-2">
                <input autocomplete="off" type="number" step="any" name="stok_keluar[]" class="w-full text-sm text-[#565725] p-2 border rounded focus:ring-green-500 focus:border-green-500" required>
            </td>
            <td class="border p-2 text-center text-[12px] uom text-[#565725] w-[50px]">-</td>
            <td class="border text-center">
                <button type="button" class="bg-red-500 text-white px-3 py-1 rounded text-center" onclick="hapusItem(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        table.appendChild(row);
        const newSelect = $(row).find('.select-bahan');
        initSelect2(newSelect);

        updateNomor();
    }

    function hapusItem(button) {
        const itemsBody = document.getElementById('items');
        const row = $(button).closest('tr');
        if (!itemsBody || row.length === 0) return;

        const totalRows = itemsBody.querySelectorAll('.item-row').length;
        if (totalRows <= 1) {
            alert('Minimal harus ada 1 baris bahan baku.');
            return;
        }

        const select = row.find('.select-bahan');
        if (select.hasClass('select2-hidden-accessible')) {
            select.select2('destroy');
        }

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

    function updateStok(select){
        const selectedOption = select.options[select.selectedIndex];
        const stok = selectedOption.getAttribute("data-stok");
        const row = select.closest("tr");
        const stokCell = row.querySelector(".stok");

        if(stokCell) {
            if(stok){
                stokCell.innerText = stok;
            }else{
                stokCell.innerText = "-";
            }
        }
    }
</script>
@endpush
@push('styles')
<style>
    .select2-container--default .select2-selection--single {
    height: 38px !important;
    min-height: 38px !important;
    display: flex !important;
    align-items: center !important;
    padding: 0 0.75rem !important;
    border: 1px solid #d1d5db !important;
    border-radius: 0.25rem !important;
    box-sizing: border-box !important;
    position: relative !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    order: 1 !important;
    flex: 1 1 auto !important;
    min-width: 0 !important;
    font-size: 0.875rem !important;
    line-height: 1.25rem !important;
    padding-left: 0 !important;
    padding-right: 0.5rem !important;
    color: #111827 !important;
}

.select2-container--default .select2-selection--single .select2-selection__clear {
    order: 2 !important;
    float: none !important;
    margin-left: auto !important;
    margin-right: 1.5rem !important; /* Jarak aman antara tombol silang (x) dan panah dropdown */
    height: auto !important;
    line-height: normal !important;
    font-size: 1rem !important;
    display: inline-flex !important;
    align-items: center !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    order: 3 !important;
    height: 100% !important;
    top: 0 !important;
    right: 0.5rem !important;
}
</style>
@endpush