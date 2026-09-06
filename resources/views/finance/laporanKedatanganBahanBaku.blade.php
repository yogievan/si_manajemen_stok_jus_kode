@extends('layout.dashboard')
@section('web_title', 'Finance Laporan Kedatangan Bahan Baku')
@section('menu')
    @include('layout.menu.finance')
@endsection
@section('name_page', 'Laporan Kedatangan Bahan Baku')
@section('content')
    <div>
        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs border border-gray-300">
            <table class="w-full text-[#565725]">
                <thead class="bg-[#565725] text-white">
                    <tr>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[30px] border border-default">
                            No
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[200px] border border-default">
                            Waktu Pembuatan
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[200px] border border-default">
                            Verifikasi Kedatangan
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[100px] border border-default">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($kedatanganBahanBaku->count() >0)
                        @foreach ($kedatanganBahanBaku as $no => $item)
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default text-[12px]">
                                <th scope="row" class="px-2 py-1 font-medium text-heading whitespace-nowrap w-[30px] text-center">
                                    {{++$no}}
                                </th>
                                <td class="px-2 py-1 text-center border border-default w-[100px]">
                                   {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y \P\u\k\u\l H:i:s') . ' WIB' : '-' }}
                                </td>
                                <td class="px-2 py-1 text-center border border-default w-[200px]">
                                    {{ $item->approved_at ? \Carbon\Carbon::parse($item->approved_at)->translatedFormat('l, d F Y \P\u\k\u\l H:i:s') . ' WIB' : '-' }}
                                </td>
                                <td class="px-2 py-1 text-center border border-default">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('finance.laporanKedatanganBahanBaku.detail', $item->id) }}">
                                            <button class="w-full bg-gray-600 hover:bg-gray-800 p-2 rounded-md text-white">
                                                <i class="fas fa-file-alt text-[16px]"></i> Detail
                                            </button>
                                        </a>
                                        <a href="{{ route('finance.laporanKedatanganBahanBaku.validasi', $item->id) }}" class="flex-1">
                                            <button class="bg-green-600 hover:bg-green-800 p-2 rounded-md text-white w-full">
                                                <i class="fas fa-tasks text-[16px]"></i> Validasi Lap. Kedatangan
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
@endsection