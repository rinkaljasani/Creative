<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
     protected $fillable = [
        'user_id', 'level'
    ];
}
