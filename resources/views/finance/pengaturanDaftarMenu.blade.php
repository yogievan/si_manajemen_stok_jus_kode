@extends('layout.dashboard')
@section('web_title', 'Finance Pengaturan')
@section('menu')
    @include('layout.menu.finance')
@endsection
@section('name_page', 'Pengaturan Daftar Menu')
@section('content')
    <div>
        <div class="mb-4">
            <button class="bg-green-600 hover:bg-green-800 p-2 rounded-md text-white" data-modal-target="tambah_menu" data-modal-toggle="tambah_menu">
                <i class="fas fa-plus-circle text-[16px]"></i> Tambah Menu baru
            </button>
        </div>

        <div id="tambah_menu" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-between p-4 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Tambah Menu Baru
                        </h3>
                        <button data-modal-hide="tambah_menu" type="button" class="text-red-400 bg-transparent hover:bg-red-200 hover:text-red-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <div class="p-4 space-y-4">
                        <form action="{{ route('finance.pengaturanMenu.tambah') }}" method="POST" class="grid grid-cols-1 gap-4">
                            @csrf

                            <div class="grid grid-cols-1 gap-2">
                                <label class="font-semibold text-gray-700">Nama Menu</label>
                                <input type="text" name="nama_menu" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Nama Menu" required>
                            </div>
                            <select name="id_kategori" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                <option value="" selected disabled>Pilih Kategori Menu</option>
                                @foreach ($kategoriMenu as $item)
                                    <option value="{{ $item -> id }}">{{ $item -> nama_kategori }}</option>
                                @endforeach
                            </select>
                            <button type="submit">
                                <div class="bg-green-600 hover:bg-green-800 p-2 rounded-md text-white w-full text-center">
                                    <i class="fas fa-plus-circle text-[16px]"></i> Simpan Menu Baru
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative max-h-screen overflow-x-auto overflow-y-auto custom-scrollbar bg-neutral-primary-soft shadow-xs border border-gray-300">
            <table class="w-full text-sm text-left text-[#565725]">
                <thead class="sticky top-0 z-30 bg-[#565725] text-white">
                    <tr>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[50px] border border-default">
                            No
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-auto border border-default">
                            Daftar Menu
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[160px] border border-default">
                            Kategori Menu
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[300px] border border-default">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($menu->count() > 0)
                        @foreach ($menu as $no => $item)
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default text-[12px]">
                                <th scope="row" class="px-2 py-1 font-medium text-heading whitespace-nowrap text-center">
                                    {{ ++$no }}
                                </th>
                                <td class="px-2 py-1 border border-default">
                                    {{ $item->nama_menu }}
                                </td>
                                <td class="px-2 py-1 border border-default text-center">
                                    {{ optional($kategoriMenu->firstWhere('id', $item->id_kategori))->nama_kategori ?? '-' }}
                                </td>
                                <td class="px-2 py-1 border border-default">
                                    <div class="flex justify-center space-x-1 items-center gap-1">
                                        <div>
                                            <button type="button" class="bg-green-600 hover:bg-green-800 text-white p-2 rounded-md flex items-center gap-2 openResepModal"
                                                data-id="{{ $item->id }}"
                                                data-nama="{{ $item->nama_menu }}"
                                                data-modal-target="tambah_resep_modal"
                                                data-modal-toggle="tambah_resep_modal">
                                                <i class="fas fa-plus-circle text-[14px]"></i> Tambah Resep
                                            </button>
                                        </div>

                                        <div>
                                            @php
                                                $inventoriList = collect($inventori ?? []);
                                                $detailResepList = collect($detailResep ?? []);
                                                $uomList = collect($uom ?? []);

                                                $resepItem = $detailResepList
                                                    ->where('id_menu', $item->id)
                                                    ->map(function ($resep) use ($inventoriList, $uomList) {
                                                        $idInventori = data_get($resep, 'id_inventori');
                                                        $bahan = $inventoriList->firstWhere('id', $idInventori);

                                                        $satuan = null;
                                                        if ($bahan) {
                                                            $uomProp = data_get($bahan, 'uom');
                                                            if (is_object($uomProp) || is_array($uomProp)) {
                                                                $satuan = data_get($uomProp, 'nama_uom') ?? data_get($uomProp, 'nama');
                                                            } elseif (is_string($uomProp)) {
                                                                $satuan = $uomProp;
                                                            }

                                                            $satuan = $satuan
                                                                ?? data_get($bahan, 'nama_uom')
                                                                ?? data_get($uomList->firstWhere('id', data_get($bahan, 'id_uom')), 'nama_uom');
                                                        }

                                                        return [
                                                            'nama_barang' => data_get($bahan, 'nama_barang', '-'),
                                                            'qty' => data_get($resep, 'qty', 0),
                                                            'uom' => $satuan ?? '',
                                                        ];
                                                    })
                                                    ->values();
                                            @endphp

                                            <button type="button"
                                                class="bg-gray-600 hover:bg-gray-800 text-white p-2 rounded-md flex items-center gap-2 openDetailResepModal"
                                                data-nama="{{ $item->nama_menu }}"
                                                data-resep='@json($resepItem)'
                                                data-modal-target="detail_resep_modal"
                                                data-modal-toggle="detail_resep_modal">
                                                <i class="fas fa-file-alt text-[14px]"></i> Detail
                                            </button>
                                        </div>
                                        <div>
                                            <a href="{{ route('finance.pengaturanMenu.hapus', $item->id) }}" data-confirm-delete="true">
                                                <button class="bg-red-600 hover:bg-red-800 p-2 rounded-md text-white " window="Hapus Bahan Baku">
                                                    <i class="fas fa-trash text-[16px]"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border">
                            <td colspan="4" class="text-center p-4">No Record Data</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div id="tambah_resep_modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-between p-4 border-b rounded-t">
                        <h3 id="resep-modal-title" class="text-xl font-semibold text-gray-900">
                            Tambah Resep
                        </h3>
                        <button data-modal-hide="tambah_resep_modal" type="button" class="text-red-400 bg-transparent hover:bg-red-200 hover:text-red-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <div class="p-2">
                        <form action="{{ route('finance.pengaturanMenu.tambahResepMenu') }}" method="POST" class="item-row grid grid-cols-1 gap-4">
                            @csrf
                            <input type="hidden" name="id_menu" id="resep-id-menu">
                            <div id="list-bahan" class="space-y-2">
                                <div class="flex gap-2">
                                    <div class="flex-auto">
                                        <select name="id_inventori[]" class="select-bahan w-full text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" required onchange="updateUOM(this); updateStok(this)">
                                            <option value="" selected disabled>Pilih Bahan Baku</option>
                                            @foreach ($inventori as $inv)
                                                <option value="{{ $inv->id }}" data-stok="{{ $inv->stok }}">
                                                    {{ $inv->nama_barang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <input type="number" step="any" name="qty[]" class="h-[38px] box-border w-full text-sm px-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Jumlah" required>
                                    </div>
                                    <div>
                                        <button type="button" class="bg-red-500 text-white px-3 py-1 rounded" onclick="hapusItem(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="tambahBahan()" class="mt-3 bg-white text-blue-600 px-4 py-2 rounded border border-blue-600 hover:bg-blue-800 hover:text-white">
                                + Tambah Bahan Baku
                            </button>
                            <button type="submit" class="mt-5">
                                <div class="bg-green-600 hover:bg-green-800 p-2 rounded-md text-white w-full text-center">
                                    <i class="fas fa-plus-circle text-[16px]"></i> Simpan Resep
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="detail_resep_modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-between p-4 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Detail Resep
                        </h3>
                        <button data-modal-hide="detail_resep_modal" type="button" class="text-red-400 bg-transparent hover:bg-red-200 hover:text-red-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <div class="p-4 space-y-3">
                        <div id="detail-resep-list" class="space-y-2">
                            <p class="text-sm text-gray-500 text-center py-3">Belum ada data resep untuk menu ini.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    function initSelect2(element) {
        $(element).select2({
            placeholder: "Pilih Bahan Baku",
            allowClear: true,
            width: '100%',
        }).on('select2:open', function () {
            const searchField = document.querySelector('.select2-container--open .select2-search__field');
            if (searchField) searchField.focus();
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initSelect2('.select-bahan');
        document.querySelectorAll('.openResepModal').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const inputIdMenu = document.getElementById('resep-id-menu');
                if (inputIdMenu && this.dataset.id) {
                    inputIdMenu.value = this.dataset.id;
                }

                const titleEl = document.getElementById('resep-modal-title');
                if (titleEl && this.dataset.nama) {
                    titleEl.textContent = `Tambah Resep - ${this.dataset.nama}`;
                }
            });
        });
    });

    function tambahBahan() {
        const listBahan = document.getElementById('list-bahan');
        if (!listBahan) return;

        const barisBaru = document.createElement('div');
        barisBaru.className = 'flex gap-2';
        barisBaru.innerHTML = `
            <div class="flex-auto">
                <select name="id_inventori[]" class="select-bahan w-full text-sm p-2 border rounded focus:ring-green-500 focus:border-green-500" required>
                    <option value="" selected disabled>Pilih Bahan Baku</option>
                    @foreach ($inventori as $inv)
                        <option value="{{ $inv->id }}" data-stok="{{ $inv->stok }}">
                            {{ $inv->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="number" step="any" name="qty[]" class="h-[38px] box-border w-full text-sm px-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Jumlah" required>
            </div>
            <div>
                <button type="button" class="bg-red-500 text-white px-3 py-1 rounded" onclick="hapusItem(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;

        listBahan.appendChild(barisBaru);
        initSelect2(barisBaru.querySelector('.select-bahan'));
    }
    function hapusItem(button) {
        const listBahan = document.getElementById('list-bahan');
        const row = button.closest('.flex');
        if (!row || !listBahan) return;

        if (listBahan.children.length <= 1) {
            alert('Minimal harus ada 1 baris bahan baku.');
            return;
        }

        const select = $(row).find('.select-bahan');
        if (select.hasClass('select2-hidden-accessible')) {
            select.select2('destroy');
        }
        row.remove();
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.openDetailResepModal').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const titleEl = document.getElementById('detail-resep-title');
                const listEl = document.getElementById('detail-resep-list');

                if (titleEl) {
                    titleEl.textContent = this.dataset.nama
                        ? `Detail Resep - ${this.dataset.nama}`
                        : 'Detail Resep';
                }

                if (!listEl) return;

                let items = [];
                try {
                    items = JSON.parse(this.dataset.resep || '[]');
                } catch (e) {
                    items = [];
                }

                if (!Array.isArray(items) || items.length === 0) {
                    listEl.innerHTML = `<p class="text-sm text-gray-500 text-center py-3">Belum ada data resep untuk menu ini.</p>`;
                    return;
                }

                listEl.innerHTML = items.map(function (row, idx) {
                    const namaBahan = row.nama_barang ?? '-';
                    const qty = row.qty ?? '-';
                    const uom = row.uom && row.uom !== '-' ? ` ${row.uom}` : '';

                    return `
                        <div class="flex justify-between items-center border border-gray-200 rounded px-3 py-2 text-sm text-gray-800">
                            <div>
                                <span class="font-medium text-gray-500 mr-2">${idx + 1}.</span>
                                <span class="font-semibold">${namaBahan}</span>
                            </div>
                            <div class="text-right font-medium text-[#565725]">
                                Jumlah: ${qty}${uom}
                            </div>
                        </div>
                    `;
                }).join('');
            });
        });
    });
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
    margin-right: 1.5rem !important;
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