<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition_participant extends Model
{
     protected $fillable = [
        'comp_id', 	'user_id', 	'sample_data', 	'status'
    ];
}
