<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permintaanBahanBakuDetail extends Model
{
    protected $table = 'permintaan_bahan_baku_detail';

    protected $fillable = [
        'id_inventori',
        'id_laporan_permintaan',
        'qty_request',
        'qty_approval_finance',
    ];
}
