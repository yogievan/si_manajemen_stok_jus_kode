<div class="text-[#565725]">
    <li class="my-2">
        <a href="{{ route('manager.dashboard') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('manager.dashboard*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-house my-auto text-white"></i> 
            <p class="text-white">Dashboard</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('manager.inventori') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('manager.inventori*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-boxes-packing my-auto text-white"></i> 
            <p class="text-white">Inventori</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('manager.laporanPermintaanBahanBaku') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('manager.laporanPermintaanBahanBaku*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-truck-loading my-auto text-white"></i> 
            <p class="text-white">Permintaan Bahan Baku</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('manager.laporanKedatanganBahanBaku') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('manager.laporanKedatanganBahanBaku*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-file-import my-auto text-white"></i> 
            <p class="text-white">Kedatangan Bahan Baku</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('manager.laporanStockHarian') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('manager.laporanStockHarian*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-box my-auto text-white"></i> 
            <p class="text-white">Laporan Stok Harian</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('manager.laporanPenjualanHarian') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('manager.laporanPenjualanHarian*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-file-invoice my-auto text-white"></i> 
            <p class="text-white">Laporan Penjualan Harian</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('manager.laporanStockOpname') }}" class="flex gap-3 p-2 rounded font-semibold {{ request()->routeIs('manager.laporanStockOpname*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-boxes my-auto text-white"></i> 
            <p class="text-white">Laporan Stok Opname</p>
        </a>
    </li>
</div>