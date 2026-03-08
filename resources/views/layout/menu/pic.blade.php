<div class="text-[#565725]">
    <li class="my-2">
        <a href="{{ route('pic.dashboard') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('pic.dashboard*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-house my-auto text-white"></i> 
            <p class="text-white">Dashboard</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('pic.inventori') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('pic.inventori*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-boxes-packing my-auto text-white"></i> 
            <p class="text-white">Inventori</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('pic.laporanKedatanganBahanBaku') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('pic.laporanKedatanganBahanBaku*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-file-import my-auto text-white"></i> 
            <p class="text-white">Kedatangan Bahan Baku</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('pic.laporanPenjualanHarian') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('pic.laporanPenjualanHarian*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-file-invoice my-auto text-white"></i>
            <p class="text-white">Laporan Penjualan Harian</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('pic.laporanStockHarian') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('pic.laporanStockHarian*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-box my-auto text-white"></i> 
            <p class="text-white">Laporan stok Harian</p>
        </a>
    </li>
</div>