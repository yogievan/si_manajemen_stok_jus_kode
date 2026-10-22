<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laporanStokHarianDetail extends Model
{
    protected $table = 'detail_laporan_stok_harian';
    protected $guarded = ['id'];
    protected $fillable = [
        'id_laporan_stok_harian',
        'id_inventori',
        'tgl_masuk',
        'tgl_keluar',
        'stok_awal',
        'stok_masuk',
        'stok_keluar',
        'keluar_buah_utuh',
        'buah_susut',
        'buah_tidak_bisa_digunakan',
        'buah_prep',
        'buah_prep_rusak',
        'stok_akhir'
    ];
}
