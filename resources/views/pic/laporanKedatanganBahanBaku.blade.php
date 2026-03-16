@extends('layout.dashboard')
@section('web_title', 'PIC Laporan Kedatangan Stock Bahan Baku')
@section('menu')
    @include('layout.menu.pic')
@endsection
@section('name_page', 'Laporan Kedatangan Bahan Baku')
@section('content')
<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs border border-gray-300">
            <table class="w-full text-[#565725]">
                <thead class="bg-[#565725] text-white">
                    <tr>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[30px] border border-default">
                            No
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[100px] border border-default">
                            Waktu Permintaan
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[200px] border border-default">
                            Waktu Approval
                        </th>
                        <th scope="col" class="px-2 py-1 font-semibold text-center w-[220px] border border-default">
                            Aksi
                        </th>
                    </tr>
                </thead>
            <tbody>
                @if ($permintaanBahanBaku->count() >0)
                    @foreach ($permintaanBahanBaku as $no => $item)
                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default text-[12px]">
                            <th scope="row" class="px-2 py-1 font-medium text-heading whitespace-nowrap w-[30px] text-center">
                                {{++$no}}
                            </th>
                            <td class="px-2 py-1 text-center border border-default w-[100px]">
                                {{ $item->tgl_request ? \Carbon\Carbon::parse($item->tgl_request)->translatedFormat('l, d F Y \P\u\k\u\l H:i:s') . ' WIB' : '-' }}
                            </td>
                            <td class="px-2 py-1 text-center border border-default w-[200px]">
                                {{ $item->approved_at ? \Carbon\Carbon::parse($item->approved_at)->translatedFormat('l, d F Y \P\u\k\u\l H:i:s') . ' WIB' : '-' }}
                            </td>
                            <td class="px-2 py-1 text-center border border-default">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('manager.laporanPermintaanBahanBaku.detail', $item->id) }}">
                                        <button class="w-full bg-gray-600 hover:bg-gray-800 p-2 rounded-md text-white">
                                            <i class="fas fa-file-alt text-[16px]"></i> Detail
                                        </button>
                                    </a>
                                    <a href="{{ route('manager.laporanPermintaanBahanBaku.edit', $item->id) }}" class="flex-auto">
                                        <button class="w-full bg-green-600 hover:bg-green-800 p-2 rounded-md text-white flex items-center gap-1 justify-center">
                                            <i class="fas fa-plus-circle text-[16px]"></i> Buat Laporan Kedatangan Bahan Baku
                                        </button>
                                    </a>
                                    <a href="{{ route('manager.laporanPermintaanBahanBaku.hapus', $item->id) }}" data-confirm-delete="true">
                                        <button class="bg-red-600 hover:bg-red-800 px-2 py-2 rounded-md text-white">
                                            <i class="fas fa-trash text-[16px]"></i>
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
@endsection