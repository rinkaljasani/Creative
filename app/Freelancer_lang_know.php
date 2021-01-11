<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer_lang_know extends Model
{
     protected $fillable = [
        'f_id', 'lang_id'
    ];

    protected $table='freelancer_lang_knows';
}
