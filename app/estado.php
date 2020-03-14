<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    protected $fillable = [
        'tipo'
    ];

    protected $casts = [
        'updated_at', 'created_at',
    ];
}
