@extends('layout.dashboard')
@section('web_title', 'Manager Inventori')
@section('menu')
    @include('layout.menu.manager')
@endsection
@section('name_page', 'Inventori Stock Bahan Baku dan Buah')
@section('content')
    <div>
        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <table class="w-full text-sm text-left text-[#565725]">
                <thead class="border border-default bg-[#565725] text-white">
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