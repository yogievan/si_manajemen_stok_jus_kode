<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class uom extends Model
{
    protected $table = 'unit_of_measurement';

    protected $fillable = [
        'nama_uom',
    ];
}
