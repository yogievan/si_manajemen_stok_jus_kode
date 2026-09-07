@extends('layout.dashboard')
@section('web_title', 'Manager Laporan stok Harian')
@section('menu')
    @include('layout.menu.manager')
@endsection
@section('name_page', 'Laporan stok Harian (Stock In/Out)')
@section('content')
<div>
    <div class="relative max-h-[80vh] overflow-x-auto overflow-y-auto custom-scrollbar border border-gray-400 shadow-md bg-white">
        <table class="w-full text-xs text-left border-collapse whitespace-nowrap">
        <thead class="sticky top-0 z-30 bg-gray-200">
            <tr>
            <th rowspan="2" class="sticky left-0 z-40 border border-gray-400 p-2 text-center bg-gray-300 min-w-[40px]">No</th>
            <th rowspan="2" class="sticky left-[40px] z-40 border border-gray-400 p-2 text-center bg-gray-300 min-w-[200px]">Agustus</th>
            <th rowspan="2" class="border border-gray-400 p-2 text-center bg-gray-300">Kategori</th>
            <th rowspan="2" class="border border-gray-400 p-2 text-center bg-gray-300 leading-tight">Movement<br>Minggu 4</th>
            <th rowspan="2" class="border border-gray-400 p-2 text-center bg-gray-300">Uom</th>

            <th colspan="2" class="border border-gray-400 p-1 text-center bg-red-600 text-white font-bold">1 Aug</th>
            <th colspan="2" class="border border-gray-400 p-1 text-center bg-gray-100 font-bold">2 Aug</th>
            <th colspan="2" class="border border-gray-400 p-1 text-center bg-gray-100 font-bold">3 Aug</th>
            <th colspan="2" class="border border-gray-400 p-1 text-center bg-gray-100 font-bold">4 Aug</th>
            <th colspan="2" class="border border-gray-400 p-1 text-center bg-gray-100 font-bold">5 Aug</th>
            <th colspan="2" class="border border-gray-400 p-1 text-center bg-gray-100 font-bold">6 Aug</th>
            <th colspan="2" class="border border-gray-400 p-1 text-center bg-gray-100 font-bold">7 Aug</th>
            </tr>

            <tr>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            <th class="border border-gray-400 p-1 text-center bg-green-100 text-green-800 w-12">IN</th>
            <th class="border border-gray-400 p-1 text-center bg-red-100 text-red-800 w-12">OUT</th>
            </tr>
        </thead>

        <tbody>
            <tr class="hover:bg-gray-100">
            <td class="sticky left-0 z-20 border border-gray-300 p-1.5 text-center bg-white">1</td>
            <td class="sticky left-[40px] z-20 border border-gray-300 p-1.5 bg-white">Roti Bakar</td>
            <td class="border border-gray-300 p-1.5 text-center bg-[#fef2cb] text-yellow-800">[M1] Bahan Maka</td>
            <td class="border border-gray-300 p-1.5 text-center">68</td>
            <td class="border border-gray-300 p-1.5 text-center bg-gray-50">Porsi</td>

            <td class="border border-gray-300 p-1.5 text-center"></td>
            <td class="border border-gray-300 p-1.5 text-center bg-red-100 text-red-600">4</td>
            <td class="border border-gray-300 p-1.5 text-center"></td>
            <td class="border border-gray-300 p-1.5 text-center bg-red-100 text-red-600">5</td>
            <td class="border border-gray-300 p-1.5 text-center"></td>
            <td class="border border-gray-300 p-1.5 text-center bg-red-100 text-red-600">9</td>
            </tr>

            <tr class="hover:bg-gray-100">
            <td class="sticky left-0 z-20 border border-gray-300 p-1.5 text-center bg-white">2</td>
            <td class="sticky left-[40px] z-20 border border-gray-300 p-1.5 bg-white">Roti Jadul</td>
            <td class="border border-gray-300 p-1.5 text-center bg-[#fef2cb] text-yellow-800">[M1] Bahan Maka</td>
            <td class="border border-gray-300 p-1.5 text-center">0</td>
            <td class="border border-gray-300 p-1.5 text-center bg-gray-50">Porsi</td>

            <td class="border border-gray-300 p-1.5 text-center"></td>
            <td class="border border-gray-300 p-1.5 text-center"></td>
            <td class="border border-gray-300 p-1.5 text-center"></td>
            <td class="border border-gray-300 p-1.5 text-center"></td>
            <td class="border border-gray-300 p-1.5 text-center"></td>
            <td class="border border-gray-300 p-1.5 text-center"></td>
            </tr>

            <tr class="hover:bg-gray-100">
            <td class="sticky left-0 z-20 border border-gray-300 p-1.5 text-center bg-white">3</td>
            <td class="sticky left-[40px] z-20 border border-gray-300 p-1.5 bg-white">Indomie Goreng</td>
            <td class="border border-gray-300 p-1.5 text-center bg-[#fef2cb] text-yellow-800">[M1] Bahan Maka</td>
            <td class="border border-gray-300 p-1.5 text-center">21</td>
            <td class="border border-gray-300 p-1.5 text-center bg-gray-50">Pcs</td>

            <td class="border border-gray-300 p-1.5 text-center"></td>
            <td class="border border-gray-300 p-1.5 text-center bg-red-100 text-red-600">5</td>
            <td class="border border-gray-300 p-1.5 text-center"></td>
            <td class="border border-gray-300 p-1.5 text-center bg-red-100 text-red-600">1</td>
            <td class="border border-gray-300 p-1.5 text-center"></td>
            <td class="border border-gray-300 p-1.5 text-center bg-red-100 text-red-600">1</td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
@endsection
