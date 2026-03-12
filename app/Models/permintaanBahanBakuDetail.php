<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permintaanBahanBakuDetail extends Model
{
    protected $table = 'detail_permintaan_bahan_baku';

    protected $fillable = [
        'id_inventori',
        'id_laporan_permintaan',
        'qty_request',
        'qty_approve',
        'keterangan_manager',
        'keterangan_finance',
    ];
}
