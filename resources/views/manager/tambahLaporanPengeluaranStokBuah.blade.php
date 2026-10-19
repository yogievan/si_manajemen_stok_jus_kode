@extends('layout.dashboard')
@section('web_title', 'Manager Laporan Pengeluaran Stok Buah')
@section('menu')
    @include('layout.menu.manager')
@endsection
@section('name_page', 'Formulir Pengeluaran Stok Harian Buah')
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

    <form action="{{ route('manager.laporanStokPengeluaranHarianBuah.simpan', $laporanStokHarian->id) }}" method="POST">
        @csrf

        <table class="w-full border border-gray-300 text-sm">
            <thead class="text-white">
                <tr>
                    <th class="bg-[#565725] border p-2 w-max-[50px]">No</th>
                    <th class="bg-[#565725] border p-2 w-[300px]">Nama Buah</th>
                    <th class="bg-[#565725] border p-2 w-[150px]">Masuk <br>(Buah Datang)</br></th>
                    <th class="bg-red-500 border p-2 w-[150px]">Buah Susut</th>
                    <th class="bg-blue-700 border p-2 w-[150px]">Keluar <br>(Buah Utuh)</br></th>
                    <th class="bg-blue-700 border p-2 w-[150px]">Buah tidak bisa digunakan</th>
                    <th class="bg-yellow-500 border p-2 w-[150px]">Buah Prep</th>
                    <th class="bg-yellow-500 border p-2 w-[150px]">Buah Prep Rusak</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventoriBuah as $no => $buah)
                    <tr>
                        <td class="border border-gray-300 p-1.5 text-center bg-white w-[40px]">
                            {{++$no}}
                        </td>
                        @php
                            if (in_array($buah->nama_barang, [
                                'Mangga Frozen (Buah Utuh)',
                                'Sirsak (Buah Utuh)',
                                'Strawberry (Buah Utuh)',
                                'Blueberry (Buah Utuh)',
                                'Blackberry (Buah Utuh)',
                                'Markisa (Buah Utuh)'
                            ])) {
                                $bgClass = 'bg-blue-300';
                            } else {
                                $bgClass = 'bg-white';
                            }
                        @endphp

                        <td class="border border-gray-300 {{ $bgClass }} p-1.5 w-[300px]">
                            <input type="hidden" name="id_inventori[]" value="{{ $buah->id }}">
                            {{ $buah->nama_barang }}
                        </td>
                        <td class="border border-gray-300 p-1.5 bg-white w-[150px] text-center">
                            <input type="number" step="any" name="stok_masuk[]" class="w-full text-center" value="{{ $buah->stok_masuk ?? 0 }}" readonly>
                        </td>
                        <td class="border border-gray-300 p-1.5 bg-white w-[150px] text-center">
                            <input type="number" step="any" name="buah_susut[]" class="w-full text-center" value="0">
                        </td>
                        <td class="border border-gray-300 p-1.5 bg-white w-[150px] text-center">
                            <input type="number" step="any" name="keluar_buah_utuh[]" class="w-full text-center" value="0">
                        </td>
                        <td class="border border-gray-300 p-1.5 bg-white w-[150px] text-center">
                            <input type="number" step="any" name="buah_tidak_bisa_digunakan[]" class="w-full text-center" value="0">
                        </td>
                        <td class="border border-gray-300 p-1.5 bg-white w-[150px] text-center">
                            <input type="number" step="any" name="buah_prep[]" class="w-full text-center" value="0">
                        </td>
                        <td class="border border-gray-300 p-1.5 bg-white w-[150px] text-center">
                            <input type="number" step="any" name="buah_prep_rusak[]" class="w-full text-center" value="0">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-10">
            <button type="submit" class="bg-green-600 hover:bg-green-800 text-white px-6 py-2 rounded">
                Simpan Laporan Pengeluaran Buah
            </button>
        </div>
    </form>
</div>
@endsection
