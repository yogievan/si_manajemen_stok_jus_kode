<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laporanStokHarian extends Model
{
    protected $table = 'laporan_stok_harian';

    protected $fillable = [
        'tgl_laporan_stok_harian',
        'status_manager',
        'confirm_finance',
    ];
}
