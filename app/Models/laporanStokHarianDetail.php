<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laporanStokHarianDetail extends Model
{
    protected $table = 'detail_laporan_stok_harian';

    protected $fillable = [
        'id_laporan_stok_harian',
        'id_inventori',
        'stock_awal',
        'stock_masuk',
        'stock_keluar',
        'tgl_masuk',
        'tgl_keluar',
        'stock_akhir',
    ];
}
