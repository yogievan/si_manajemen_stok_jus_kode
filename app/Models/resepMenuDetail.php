<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resepMenuDetail extends Model
{
    protected $table = 'detail_resep_menu';

    protected $fillable = [
        'id_menu',
        'id_inventori',
        'qty',
    ];
}
