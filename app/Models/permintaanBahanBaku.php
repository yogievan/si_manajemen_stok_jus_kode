<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permintaanBahanBaku extends Model
{
    protected $table = 'laporan_permintaan_bahan_baku';

    protected $fillable = [
        'tgl_request',
        'keterangan_manager',
        'status_finance',
        'keterangan_finance',
        'approved_at',
    ];
}
