<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'id_kategori',
        'nama_menu',
    ];
}
