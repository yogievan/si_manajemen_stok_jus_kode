<ul class="text-[#565725]">
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
        <a href="{{ route('finance.laporanStokHarian') }}" class="flex gap-3 p-2 rounded font-semibold hover:bg-[#acac56] {{ request()->routeIs('finance.laporanStockHarian*') ? 'bg-[#acac56]' : '' }}">
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
        <a href="{{ route('finance.laporanStokOpname') }}" class="flex gap-3 p-2 rounded font-semibold hover:bg-[#acac56] {{ request()->routeIs('finance.laporanStockOpname*') ? 'bg-[#acac56]' : '' }}">
            <i class="fa fa-boxes my-auto text-white"></i>
            <p class="text-white">Laporan Stok Opname</p>
        </a>
    </li>
    <li class="my-2">
    <button type="button" class="w-full flex items-center justify-between p-2 rounded font-semibold hover:bg-[#acac56] group" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
        <div class="flex items-center gap-3">
            <i class="fas fa-cog my-auto text-white"></i>
            <span class="text-white">Pengaturan</span>
        </div>
        <i class="fas fa-chevron-down text-white ml-auto"></i>
    </button>
    <ul id="dropdown-example" class="hidden py-2 space-y-2">
        <li>
            <a href="{{ route('finance.pengaturanKategoriUom') }}" class="pl-10 flex items-center px-2 py-1.5 text-white rounded-base font-semibold hover:bg-[#acac56] group">Kategori Unit of Mesurement (UOM)</a>
        </li>
        <li>
            <a href="{{ route('finance.pengaturanKategoriMenu') }}" class="pl-10 flex items-center px-2 py-1.5 text-white rounded-base font-semibold hover:bg-[#acac56] group">Kategori Menu</a>
        </li>
        <li>
            <a href="{{ route('finance.pengaturanMenu') }}" class="pl-10 flex items-center px-2 py-1.5 text-white rounded-base font-semibold hover:bg-[#acac56] group">Daftar Menu</a>
        </li>
        <li>
            <a href="{{ route('finance.pengaturanAkunPengguna') }}" class="pl-10 flex items-center px-2 py-1.5 text-white rounded-base font-semibold hover:bg-[#acac56] group">Akun Pengguna</a>
        </li>
    </ul>
</ul>
