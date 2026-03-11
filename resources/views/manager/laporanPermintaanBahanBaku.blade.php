@extends('layout.dashboard')
@section('web_title', 'Manager Laporan Permintaan Bahan Baku')
@section('menu')
    @include('layout.menu.manager')
@endsection
@section('name_page', 'Laporan Permintaan Bahan Baku')
@section('content')
    <div>
        <div class="mb-4">
            <a href="{{ route('manager.laporanPermintaanBahanBaku.tambah') }}">
                <button class="bg-green-600 hover:bg-green-800 p-2 rounded-md text-white" data-modal-target="permintaan_bahan_baku" data-modal-toggle="permintaan_bahan_baku">
                    <i class="fas fa-plus-circle text-[16px]"></i> Ajukan Permintaan Bahan Baku
                </button>
            </a>
        </div>
    </div>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs border border-gray-300">
            <table class="w-full text-sm text-left text-[#565725]">
                <thead class="bg-[#565725] text-white">
                <tr>
                    <th scope="col" class="px-2 py-1 font-semibold text-center w-[30px] border border-default">
                        No
                    </th>
                    <th scope="col" class="px-2 py-1 font-semibold text-center w-[150px] border border-default">
                        Waktu Permintaan
                    </th>
                    <th scope="col" class="px-2 py-1 font-semibold text-center w-[150px] border border-default">
                        Keterangan Manager
                    </th>
                    <th scope="col" class="px-2 py-1 font-semibold text-center w-[150px] border border-default">
                        Tanggal Approval
                    </th>
                    <th scope="col" class="px-2 py-1 font-semibold text-center w-[70px] border border-default">
                        Status Finance
                    </th>
                    <th scope="col" class="px-2 py-1 font-semibold text-center w-[70px] border border-default">
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
                            <td class="px-2 py-1 border border-default w-[150px]">
                                {{ \Carbon\Carbon::parse($item->tgl_request)->translatedFormat('d F Y \P\u\k\u\l H:i') }} WIB
                            </td>
                            <td class="px-2 py-1 text-center border border-default w-[150px]">
                                {{ $item -> keterangan_manager }}
                            </td>
                            <td class="px-2 py-1 text-center border border-default w-[150px]">
                                {{ $item -> approve_at }}
                            </td>
                            <td class="px-2 py-1 text-center border border-default w-[70px]">
                                {{ $item -> status_finance }}
                            </td>
                            <td class="px-2 py-1 text-center border border-default w-[70px]">
                                <div class="flex justify-center gap-2">
                                    <a href="#">
                                        <button class="bg-gray-600 hover:bg-gray-800 p-2 rounded-md text-white openEditModal">
                                            <i class="fas fa-file-alt text-[16px]"></i> Detail
                                        </button></a>
                                    </a>
                                    <a href="{{ route('manager.laporanPermintaanBahanBaku.edit', $item->id) }}">
                                        <button class="bg-blue-600 hover:bg-blue-800 p-2 rounded-md text-white openEditModal">
                                            <i class="fas fa-edit text-[16px]"></i> Edit
                                        </button>
                                    </a>
                                    <a href="{{ route('manager.laporanPermintaanBahanBaku.hapus', $item->id) }}" data-confirm-delete="true">
                                        <button class="bg-red-600 hover:bg-red-800 p-2 rounded-md text-white " window="Hapus Laporan Permintaan Bahan Baku">
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