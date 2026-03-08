<div class="text-[#565725]">
    <li class="my-2">
        <a href="{{ route('finance.dashboard') }}" class="flex gap-3 p-2 rounded font-semibold hover:bg-[#acac56] {{ request()->routeIs('finance.dashboard*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-house my-auto text-white"></i> 
            <p class="text-white">Dashboard</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('finance.inventori') }}" class="flex gap-3 p-2 rounded font-semibold hover:bg-[#acac56] {{ request()->routeIs('finance.inventori*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-boxes-packing my-auto text-white"></i> 
            <p class="text-white">Inventori</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('finance.laporanPermintaanBahanBaku') }}" class="flex gap-3 p-2 rounded font-semibold hover:bg-[#acac56] {{ request()->routeIs('finance.laporanPermintaanBahanBaku*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-truck-loading my-auto text-white"></i> 
            <p class="text-white">Permintaan Bahan Baku</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('finance.laporanKedatanganBahanBaku') }}" class="flex gap-3 p-2 rounded font-semibold hover:bg-[#acac56] {{ request()->routeIs('finance.laporanKedatanganBahanBaku*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-file-import my-auto text-white"></i> 
            <p class="text-white">Kedatangan Bahan Baku</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('finance.laporanStockHarian') }}" class="flex gap-3 p-2 rounded font-semibold hover:bg-[#acac56] {{ request()->routeIs('finance.laporanStockHarian*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-box my-auto text-white"></i> 
            <p class="text-white">Laporan Stok Harian</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('finance.laporanPenjualanHarian') }}" class="flex gap-3 p-2 rounded font-semibold hover:bg-[#acac56] {{ request()->routeIs('finance.laporanPenjualanHarian*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-file-invoice my-auto text-white"></i> 
            <p class="text-white">Laporan Penjualan Harian</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('finance.laporanStockOpname') }}" class="flex gap-3 p-2 rounded font-semibold hover:bg-[#acac56] {{ request()->routeIs('finance.laporanStockOpname*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-boxes my-auto text-white"></i> 
            <p class="text-white">Laporan Stok Opname</p>
        </a>
    </li>
    <li class="my-2">
        <a href="{{ route('finance.pengaturan') }}" class="flex gap-3 p-2 rounded font-semibold hover:bg-[#acac56] {{ request()->routeIs('finance.pengaturan*') ? 'bg-[#acac56]' : '' }}">
            <i class="fas fa-cog my-auto text-white"></i> 
            <p class="text-white">Pengaturan</p>
        </a>
    </li>
</div>