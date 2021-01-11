<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer_past_expr extends Model
{
     protected $fillable = [
      'f_id' ,	'job_position', 'Company_Name', 'location', 'joining_date','leaving_date'
    ];
}
