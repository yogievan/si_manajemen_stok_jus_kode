<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class inventori extends Model
{
    protected $table = 'inventori';

    protected $fillable = [
        'nama_barang',
        'id_kategori',
        'id_uom',
        'lead_time',
        'stock',
        'average_daily_usage',
        'safety_stock',
        'reorder_point',
    ];

    public function uom()
    {
        return $this->belongsTo(uom::class, 'id_uom');
    }
}
