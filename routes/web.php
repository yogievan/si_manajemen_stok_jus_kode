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
Route::get('/finance/laporankedatanganbahanbaku', [App\Http\Controllers\financeController::class, 'laporanKedatanganBahanBakuFinance'])->name('finance.laporanKedatanganBahanBaku');
Route::get('/finance/laporanpenjualanharian', [App\Http\Controllers\financeController::class, 'laporanPenjualanHarianFinance'])->name('finance.laporanPenjualanHarian');
Route::get('/finance/laporanstockharian', [App\Http\Controllers\financeController::class, 'laporanStockHarianFinance'])->name('finance.laporanStockHarian');
Route::get('/finance/laporanstockopname', [App\Http\Controllers\financeController::class, 'laporanStockOpnameFinance'])->name('finance.laporanStockOpname');
Route::get('/finance/laporanpermintaanbahanbaku', [App\Http\Controllers\financeController::class, 'laporanPermintaanBahanBakuFinance'])->name('finance.laporanPermintaanBahanBaku');
Route::get('/finance/pengaturan', [App\Http\Controllers\financeController::class, 'pengaturan'])->name('finance.pengaturan');

// Manager Routes
Route::get('/manager/dashboard', [App\Http\Controllers\managerController::class, 'dashboardManager'])->name('manager.dashboard');
Route::get('/manager/inventori', [App\Http\Controllers\managerController::class, 'inventoriManager'])->name('manager.inventori');
Route::get('/manager/laporankedatanganbahanbaku', [App\Http\Controllers\managerController::class, 'laporanKedatanganBahanBakuManager'])->name('manager.laporanKedatanganBahanBaku');
Route::get('/manager/laporanpenjualanharian', [App\Http\Controllers\managerController::class, 'laporanPenjualanHarianManager'])->name('manager.laporanPenjualanHarian');
Route::get('/manager/laporanpermintaanbahanbaku', [App\Http\Controllers\managerController::class, 'laporanPermintaanBahanBakuManager'])->name('manager.laporanPermintaanBahanBaku');
Route::get('/manager/laporanpermintaanbahanbaku/tambah', [App\Http\Controllers\managerController::class, 'tambahLaporanPermintaanBahanBakuManager'])->name('manager.laporanPermintaanBahanBaku.tambah');
Route::post('/manager/laporanpermintaanbahanbaku/tambah/simpan', [App\Http\Controllers\managerController::class, 'simpanLaporanPermintaanBahanBakuManager'])->name('manager.laporanPermintaanBahanBaku.simpan');
Route::get('/manager/laporanstockharian', [App\Http\Controllers\managerController::class, 'laporanStockHarianManager'])->name('manager.laporanStockHarian');
Route::get('/manager/laporanstockopname', [App\Http\Controllers\managerController::class, 'laporanStockOpnameManager'])->name('manager.laporanStockOpname');

// PIC Routes
Route::get('/pic/dashboard', [App\Http\Controllers\picController::class, 'dashboardPic'])->name('pic.dashboard');
Route::get('/pic/inventori', [App\Http\Controllers\picController::class, 'inventoriPic'])->name('pic.inventori');
Route::get('/pic/laporankedatanganbahanbaku', [App\Http\Controllers\picController::class, 'laporanKedatanganBahanBakuPic'])->name('pic.laporanKedatanganBahanBaku');
Route::get('/pic/laporanpenjualanharian', [App\Http\Controllers\picController::class, 'laporanPenjualanHarianPic'])->name('pic.laporanPenjualanHarian');
Route::get('/pic/laporanstockharian', [App\Http\Controllers\picController::class, 'laporanStockHarianPic'])->name('pic.laporanStockHarian');