@extends('layout.dashboard')
@section('web_title', 'Finance Inventori')
@section('menu')
    @include('layout.menu.finance')
@endsection
@section('name_page', 'Inventori')
@section('content')
    <div>
        <div class="mb-4">
            <button class="bg-green-600 hover:bg-green-800 p-2 rounded-md text-white" data-modal-target="tambah_inventori" data-modal-toggle="tambah_inventori">
                <i class="fas fa-plus-circle text-[16px]"></i> Tambah Inventori
            </button>
        </div>

        <div id="tambah_inventori" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-between p-4 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Tambah Inventori Bahan Baku/Buah
                        </h3>
                        <button data-modal-hide="tambah_inventori" type="button" class="text-red-400 bg-transparent hover:bg-red-200 hover:text-red-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <div class="p-4 space-y-4">
                        <form action="{{ route('finance.inventori.tambah') }}" method="POST" class="grid grid-cols-1 gap-4">
                            @csrf
                            <div>
                                <input type="text" name="nama_barang" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Nama Barang" required>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <select name="id_kategori" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                    <option selected>Pilih Kategori Bahan Baku</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item -> id }}">{{ $item -> nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="stock" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Stock Awal">
                                <select name="id_uom" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                    <option selected>Pilih Unit Of Measurement</option>
                                    @foreach ($uom as $item)
                                        <option value="{{ $item -> id }}">{{ $item -> nama_uom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-4 gap-4">
                                <div class="flex gap-1">
                                    <input type="number" name="lead_time" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Lead Time">
                                    <p class="text-center align-center content-center">Hari</p>
                                </div>
                                <input type="number" name="average_daily_usage" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Average Daily Usage">
                                <input type="number" name="safety_stock" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Safety Stock">
                                <input type="number" name="reorder_point" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Reorder Point">
                            </div>
                            <button type="submit">
                                <div class="bg-green-600 hover:bg-green-800 p-2 rounded-md text-white w-full text-center">
                                    <i class="fas fa-plus-circle text-[16px]"></i> Simpan ke Inventori Bahan Baku/Buah
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs border border-gray-300">
            <table class="w-full text-sm text-left text-[#565725]">
                <thead class="bg-[#565725] text-white">
                    <tr>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[30px] border border-default">
                            No
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[200px] border border-default">
                            Nama Barang
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[70px] border border-default">
                            Kategori
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[50px] border border-default">
                            Stock
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[50px] border border-default">
                            Lead Time
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[50px] border border-default">
                            Average Daily Usage
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[50px] border border-default">
                            Safety Stock
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[50px] border border-default">
                            Reorder Point
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[50px] border border-default">
                            UOM
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center border border-default">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($inventori->count() >0)
                        @foreach ($inventori as $no => $item)
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default text-[12px]">
                                <th scope="row" class="px-2 py-1 font-medium text-heading whitespace-nowrap w-[30px] text-center">
                                    {{++$no}}
                                </th>
                                <td class="px-2 py-1 border border-default w-[200px]">
                                    {{ $item -> nama_barang }}
                                </td>
                                @php
                                    $kat = $kategori->firstWhere('id', $item->id_kategori);
                                    $warna = $colorMap[$item->id_kategori] ?? 'bg-gray-100';    
                                @endphp
                                <td class="px-2 py-1 text-center border border-default w-[70px] {{ $warna }} text-black">
                                    {{ $kat->nama_kategori ?? '-' }}
                                </td>
                                <td class="px-2 py-1 text-center border border-default w-[50px]">
                                    {{ $item -> stock }}
                                </td>
                                <td class="px-2 py-1 text-center border border-default w-[50px]">
                                    {{ $item -> lead_time }}
                                </td>
                                <td class="px-2 py-1 text-center border border-default w-[50px]">
                                    {{ $item -> average_daily_usage }}
                                </td>
                                <td class="px-2 py-1 text-center border border-default w-[50px]">
                                    {{ $item -> safety_stock }}
                                </td>
                                <td class="px-2 py-1 text-center border border-default w-[50px]">
                                    {{ $item -> reorder_point }}
                                </td>
                                <td class="px-2 py-1 text-center border border-default w-[50px]">
                                    {{ optional($uom->firstWhere('id', $item->id_uom))->nama_uom }}
                                </td>
                                <td class="px-2 py-1 text-center w-[100px]">
                                    <div class="flex justify-center gap-2">
                                        <button class="bg-blue-600 hover:bg-blue-800 p-2 rounded-md text-white openEditModal"
                                            data-id="{{ $item->id }}"
                                            data-nama="{{ $item->nama_barang }}"
                                            data-leadtime="{{ $item->lead_time }}"
                                            data-averagedailyusage="{{ $item->average_daily_usage }}"
                                            data-safetystock="{{ $item->safety_stock }}"
                                            data-reorderpoint="{{ $item->reorder_point }}"
                                            data-kategori="{{ $item->id_kategori }}"
                                            data-stock="{{ $item->stock }}"
                                            data-uom="{{ $item->id_uom }}"
                                            data-modal-target="editModal"
                                            data-modal-toggle="editModal">
                                            <i class="fas fa-edit text-[16px]"></i> Edit
                                        </button>
                                        <div id="editModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative bg-white rounded-lg shadow-sm">
                                                <div class="flex items-center justify-between p-4 border-b rounded-t">
                                                    <h3 class="text-xl font-semibold text-gray-900">
                                                        Edit Inventori Bahan Baku/Buah
                                                    </h3>
                                                    <button data-modal-hide="editModal" type="button" class="text-red-400 bg-transparent hover:bg-red-200 hover:text-red-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>

                                                <div class="p-4 space-y-4">
                                                    <form action="{{ route('finance.inventori.edit') }}" method="POST" class="grid grid-cols-1 gap-4">
                                                        @csrf
                                                        <input type="hidden" name="id" id="edit-id">
                                                        <div>
                                                            <input type="text" name="nama_barang" id="edit-nama" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Nama Barang" required>
                                                        </div>
                                                        <div class="grid grid-cols-3 gap-4">
                                                            <select name="id_kategori" id="edit-kategori" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                                                <option selected>Pilih Kategori Bahan Baku</option>
                                                                @foreach($kategori as $k)
                                                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="number" name="stock" id="edit-stock" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Stock Awal">
                                                            <select name="id_uom" id="edit-uom" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                                                <option selected>Pilih Unit Of Measurement</option>
                                                               @foreach($uom as $u)
                                                                    <option value="{{ $u->id }}">{{ $u->nama_uom }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="grid grid-cols-4 gap-4">
                                                            <div class="flex gap-1">
                                                                <input type="number" name="lead_time" id="edit-lead_time" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Lead Time">
                                                                <p class="text-center align-center content-center">Hari</p>
                                                            </div>
                                                            <input type="number" name="average_daily_usage" id="edit-average_daily_usage" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Average Daily Usage">
                                                            <input type="number" name="safety_stock" id="edit-safety_stock" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Safety Stock">
                                                            <input type="number" name="reorder_point" id="edit-reorder_point" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" placeholder="Reorder Point">
                                                        </div>
                                                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 p-2 rounded-md text-white w-full align-center">
                                                            <i class="fas fa-plus-circle text-[16px] text-center"></i> Perbarui Bahan Baku
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('finance.inventori.hapus', $item->id) }}" data-confirm-delete="true">
                                            <button class="bg-red-600 hover:bg-red-800 p-2 rounded-md text-white">
                                                <i class="fas fa-trash text-[16px]"></i> Delete
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border">
                            <td colspan="8" class="text-center p-2">No Record Data</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.openEditModal');

        buttons.forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('edit-id').value = this.dataset.id;
                document.getElementById('edit-nama').value = this.dataset.nama;
                document.getElementById('edit-lead_time').value = this.dataset.leadtime;
                document.getElementById('edit-average_daily_usage').value = this.dataset.averagedailyusage;
                document.getElementById('edit-safety_stock').value = this.dataset.safetystock;
                document.getElementById('edit-reorder_point').value = this.dataset.reorderpoint;
                document.getElementById('edit-kategori').value = this.dataset.kategori;
                document.getElementById('edit-stock').value = this.dataset.stock;
                document.getElementById('edit-uom').value = this.dataset.uom;
            });
        });
    });
    </script>
@endsection