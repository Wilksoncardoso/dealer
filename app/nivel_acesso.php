<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nivel_acesso extends Model
{
    protected $fillable = [
        'nivel_acesso'
    ];

    protected $casts = [
        'updated_at', 'created_at',
    ];
}
