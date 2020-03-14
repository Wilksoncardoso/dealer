<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'post';

    protected $fillable = [
        'id_user','id_estado','titulo','texto','assunto','image'
    ];

}
