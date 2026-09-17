<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laporanStokHarianDetail extends Model
{
    protected $table = 'detail_laporan_stok_harian';

    protected $fillable = [
        'id_laporan_stok_harian',
        'id_inventori',
        'stok_awal',
        'stok_masuk',
        'stok_keluar',
        'tgl_masuk',
        'tgl_keluar',
        'stok_akhir',
    ];
}
