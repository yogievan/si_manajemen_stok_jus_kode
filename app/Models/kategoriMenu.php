<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategoriMenu extends Model
{
    protected $table = 'kategori_menu';

    protected $fillable = [
        'nama_kategori',
    ];
}
