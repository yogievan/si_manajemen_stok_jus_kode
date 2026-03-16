<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kedatanganBahanBaku extends Model
{
     protected $table = 'laporan_kedatangan_bahan_baku';

    protected $fillable = [
        'id_request',
        'id_users',
        'approved_at',
    ];
}
