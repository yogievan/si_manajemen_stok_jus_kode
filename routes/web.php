<?php

use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('auth.login');
});

// Finance Routes
Route::get('/finance/dashboard', [App\Http\Controllers\financeController::class, 'dashboardFinance'])->name('finance.dashboard');
Route::get('/finance/inventori', [App\Http\Controllers\financeController::class, 'inventoriFinance'])->name('finance.inventori');
Route::post('/finance/inventori/tambah', [App\Http\Controllers\financeController::class, 'tambahInventoriFinance'])->name('finance.inventori.tambah');
Route::delete('/finance/inventori/hapus-{id}', [App\Http\Controllers\financeController::class, 'hapusInventoriFinance'])->name('finance.inventori.hapus');
Route::post('/finance/inventori/edit', [App\Http\Controllers\financeController::class, 'editInventoriFinance'])->name('finance.inventori.edit');
Route::get('/finance/laporanpermintaanbahanbaku', [App\Http\Controllers\financeController::class, 'laporanPermintaanBahanBakuFinance'])->name('finance.laporanPermintaanBahanBaku');
Route::get('/finance/laporanpermintaanbahanbaku/detail/{id}', [App\Http\Controllers\financeController::class, 'detailLaporanPermintaanBahanBakuFinance'])->name('finance.laporanPermintaanBahanBaku.detail');
Route::get('/finance/laporanpermintaanbahanbaku/validasi/{id}', [App\Http\Controllers\financeController::class, 'validasiLaporanPermintaanBahanBakuFinance'])->name('finance.laporanPermintaanBahanBaku.validasi');
Route::put('/finance/laporanpermintaanbahanbaku/validasi/{id}/simpan', [App\Http\Controllers\financeController::class, 'simpanValidasiLaporanPermintaanBahanBakuFinance'])->name('finance.laporanPermintaanBahanBaku.validasi.simpan');
Route::get('/finance/laporankedatanganbahanbaku', [App\Http\Controllers\financeController::class, 'laporanKedatanganBahanBakuFinance'])->name('finance.laporanKedatanganBahanBaku');
Route::get('/finance/laporankedatanganbahanbaku/detail/{id}', [App\Http\Controllers\financeController::class, 'detailLaporanKedatanganBahanBakuFinance'])->name('finance.laporanKedatanganBahanBaku.detail');
Route::get('/finance/laporankedatanganbahanbaku/validasi/{id}', [App\Http\Controllers\financeController::class, 'validasiLaporanKedatanganBahanBakuFinance'])->name('finance.laporanKedatanganBahanBaku.validasi');
Route::put('/finance/laporankedatanganbahanbaku/validasi/{id}/simpan', [App\Http\Controllers\financeController::class, 'simpanValidasiLaporanKedatanganBahanBakuFinance'])->name('finance.laporanKedatanganBahanBaku.validasi.simpan');
Route::get('/finance/laporanpenjualanharian', [App\Http\Controllers\financeController::class, 'laporanPenjualanHarianFinance'])->name('finance.laporanPenjualanHarian');
Route::get('/finance/laporanstokharian', [App\Http\Controllers\financeController::class, 'laporanStokHarianFinance'])->name('finance.laporanStokHarian');
Route::post('/finance/laporanStokHarian/tambah', [App\Http\Controllers\financeController::class, 'tambahLaporanStokHarianFinance'])->name('finance.laporanStokHarian.tambah');
Route::get('/finance/laporanstokharian/detail/{id}', [App\Http\Controllers\financeController::class, 'detailLaporanStokHarianFinance'])->name('finance.laporanStokHarian.detail');
Route::get('/finance/laporanStokOpname', [App\Http\Controllers\financeController::class, 'laporanStokOpnameFinance'])->name('finance.laporanStokOpname');
Route::get('/finance/pengaturan', [App\Http\Controllers\financeController::class, 'pengaturan'])->name('finance.pengaturan');

// Manager Routes
Route::get('/manager/dashboard', [App\Http\Controllers\managerController::class, 'dashboardManager'])->name('manager.dashboard');
Route::get('/manager/inventori', [App\Http\Controllers\managerController::class, 'inventoriManager'])->name('manager.inventori');
Route::get('/manager/laporankedatanganbahanbaku', [App\Http\Controllers\managerController::class, 'laporanKedatanganBahanBakuManager'])->name('manager.laporanKedatanganBahanBaku');
Route::get('/manager/laporankedatanganbahanbaku/detail/{id}', [App\Http\Controllers\managerController::class, 'detailLaporanKedatanganBahanBakuManager'])->name('manager.laporanKedatanganBahanBaku.detail');
Route::get('/manager/laporankedatanganbahanbaku/tambah/{id}', [App\Http\Controllers\managerController::class, 'tambahLaporanKedatanganBahanBakuManager'])->name('manager.laporanKedatanganBahanBaku.tambah');
Route::put('/manager/laporankedatanganbahanbaku/tambah/{id}/simpan', [App\Http\Controllers\managerController::class, 'simpanTambahLaporanKedatanganBahanBakuManager'])->name('manager.laporanKedatanganBahanBaku.simpan');
Route::get('/manager/laporankedatanganbahanbaku/edit/{id}', [App\Http\Controllers\managerController::class, 'editLaporanKedatanganBahanBakuManager'])->name('manager.laporanKedatanganBahanBaku.edit');
Route::put('/manager/laporankedatanganbahanbaku/edit/{id}/simpan', [App\Http\Controllers\managerController::class, 'simpanEditLaporanKedatanganBahanBakuManager'])->name('manager.laporanKedatanganBahanBaku.update');
Route::delete('/manager/laporankedatanganbahanbaku/hapus/{id}', [App\Http\Controllers\managerController::class, 'hapusLaporanKedatanganBahanBakuManager'])->name('manager.laporanKedatanganBahanBaku.hapus');
Route::get('/manager/laporanpenjualanharian', [App\Http\Controllers\managerController::class, 'laporanPenjualanHarianManager'])->name('manager.laporanPenjualanHarian');
Route::get('/manager/laporanpermintaanbahanbaku', [App\Http\Controllers\managerController::class, 'laporanPermintaanBahanBakuManager'])->name('manager.laporanPermintaanBahanBaku');
Route::get('/manager/laporanpermintaanbahanbaku/detail/{id}', [App\Http\Controllers\managerController::class, 'detailLaporanPermintaanBahanBakuManager'])->name('manager.laporanPermintaanBahanBaku.detail');
Route::get('/manager/laporanpermintaanbahanbaku/tambah', [App\Http\Controllers\managerController::class, 'tambahLaporanPermintaanBahanBakuManager'])->name('manager.laporanPermintaanBahanBaku.tambah');
Route::post('/manager/laporanpermintaanbahanbaku/tambah/simpan', [App\Http\Controllers\managerController::class, 'simpanTambahLaporanPermintaanBahanBakuManager'])->name('manager.laporanPermintaanBahanBaku.simpan');
Route::get('/manager/laporanpermintaanbahanbaku/edit/{id}', [App\Http\Controllers\managerController::class, 'editLaporanPermintaanBahanBakuManager'])->name('manager.laporanPermintaanBahanBaku.edit');
Route::put('/manager/laporanpermintaanbahanbaku/edit/{id}/simpan', [App\Http\Controllers\managerController::class, 'simpanEditLaporanPermintaanBahanBakuManager'])->name('manager.laporanPermintaanBahanBaku.update');
Route::delete('/manager/laporanpermintaanbahanbaku/hapus/{id}', [App\Http\Controllers\managerController::class, 'hapusLaporanPermintaanBahanBakuManager'])->name('manager.laporanPermintaanBahanBaku.hapus');
Route::get('/manager/laporanstokharian', [App\Http\Controllers\managerController::class, 'laporanStokHarianManager'])->name('manager.laporanStokHarian');
Route::get('/manager/laporanstokharian/detail/{id}', [App\Http\Controllers\managerController::class, 'detailLaporanStokHarianManager'])->name('manager.laporanStokHarian.detail');
Route::get('/manager/laporanstokharian/pengeluaran/tambah/{id}', [App\Http\Controllers\managerController::class, 'tambahLaporanPengeluaranStokHarianManager'])->name('manager.laporanStokPengeluaranHarian.tambah');
Route::post('/manager/laporanstokharian/pengeluaran/tambah/{id}/simpan', [App\Http\Controllers\managerController::class, 'simpanTambahLaporanPengeluaranStokHarianManager'])->name('manager.laporanStokPengeluaranHarian.simpan');
Route::get('/manager/laporanstokopname', [App\Http\Controllers\managerController::class, 'laporanStokOpnameManager'])->name('manager.laporanStokOpname');

// PIC Routes
Route::get('/pic/dashboard', [App\Http\Controllers\picController::class, 'dashboardPic'])->name('pic.dashboard');
Route::get('/pic/inventori', [App\Http\Controllers\picController::class, 'inventoriPic'])->name('pic.inventori');
Route::get('/pic/laporankedatanganbahanbaku', [App\Http\Controllers\picController::class, 'laporanKedatanganBahanBakuPic'])->name('pic.laporanKedatanganBahanBaku');
Route::delete('/pic/laporankedatanganbahanbaku/hapus/{id}', [App\Http\Controllers\picController::class, 'hapusLaporanKedatanganBahanBakuPic'])->name('pic.laporanKedatanganBahanBaku.hapus');
Route::get('/pic/laporanpenjualanharian', [App\Http\Controllers\picController::class, 'laporanPenjualanHarianPic'])->name('pic.laporanPenjualanHarian');
Route::get('/pic/laporanstokharian', [App\Http\Controllers\picController::class, 'laporanStokHarianPic'])->name('pic.laporanStokHarian');
