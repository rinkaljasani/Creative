<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
     protected $fillable = [
        'user_id', 'pro_id', 'competition_name', 'comptetion_des', 'reg_deadline', 'submission_deadline'
    ];
}
