<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laporanStokHarian extends Model
{
    protected $table = 'laporan_stok_harian';

    protected $fillable = [
        'bulan',
        'tahun',
        'status_manager',
        'confirm_finance',
    ];
}
