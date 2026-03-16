<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kedatanganBahanBakuDetail extends Model
{
        protected $table = 'detail_kedatangan_bahan_baku';
    
        protected $fillable = [
            'id_laporan_kedatangan',
            'id_inventori',
            'total_terima',
            'lampiran_kedatangan',
            'status_manager',
            'keterangan_manager',
            'status_finance',
            'keterangan_finance',
        ];
}
