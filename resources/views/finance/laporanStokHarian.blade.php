@extends('layout.dashboard')
@section('web_title', 'Finance Laporan stok Harian')
@section('menu')
    @include('layout.menu.finance')
@endsection
@section('name_page', 'Laporan stok Harian (Stock In/Out)')
@section('content')
    <div>
        <div class="mb-4">
            <button class="bg-green-600 hover:bg-green-800 p-2 rounded-md text-white" data-modal-target="tambah_laporan_stok_harian" data-modal-toggle="tambah_laporan_stok_harian">
                <i class="fas fa-plus-circle text-[16px]"></i> Buat Laporan Stock Harian Bahan Baku
            </button>
        </div>
        <div id="tambah_laporan_stok_harian" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-between p-4 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Tambah Laporan Stock Harian Bahan Baku
                        </h3>
                        <button data-modal-hide="tambah_laporan_stok_harian" type="button" class="text-red-400 bg-transparent hover:bg-red-200 hover:text-red-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <div class="p-4 space-y-4">
                        <form action="{{ route('finance.laporanStokHarian.tambah') }}" method="POST" class="grid grid-cols-1 gap-4">
                            @csrf
                            <div class="grid grid-cols-2 gap-2">
                                <select name="bulan" class="border border-gray-400 p-2 rounded focus:outline-none focus:border-blue-500">
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                <input type="number" name="tahun" placeholder="Tahun" class="border border-gray-400 p-2 rounded focus:outline-none focus:border-blue-500">
                            </div>
                            <button type="submit">
                                <div class="bg-green-600 hover:bg-green-800 p-2 rounded-md text-white w-full text-center">
                                    <i class="fas fa-plus-circle text-[16px]"></i> Buat Laporan Stock Harian Bahan Baku
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs border border-gray-300">
            <table class="w-full text-[#565725]">
                <thead class="bg-[#565725] text-white">
                    <tr>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[30px] border border-default">
                            No
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[100px] border border-default">
                            Tanggal Laporan Dibuat
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[100px] border border-default">
                            Periode Laporan Stock Harian
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[100px] border border-default">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($laporanStockHarian->count() >0)
                        @foreach ($laporanStockHarian as $no => $item)
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default text-[12px]">
                                <th scope="row" class="px-2 py-1 font-medium text-heading whitespace-nowrap w-[30px] text-center">
                                    {{++$no}}
                                </th>
                                <td class="px-2 py-1 text-center border border-default w-[100px]">
                                </td>
                                <td class="px-2 py-1 text-center border border-default w-[100px]">
                                </td>
                                <td class="px-2 py-1 text-center border border-default w-[200px]">
                                </td>
                                <td class="px-2 py-1 border border-default">
                                    <a href="#">
                                        <button class="bg-gray-600 hover:bg-gray-800 p-2 rounded-md text-white">
                                            <i class="fas fa-file-alt text-[16px]"></i> Detail Laporan Stock Harian
                                        </button>
                                    </a>
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
@endsection