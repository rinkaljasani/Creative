<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
     protected $fillable = [
        'master_skill','skill','image','discription'
    ];
}
