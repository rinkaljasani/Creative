<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_fskill extends Model
{
     protected $fillable = [
        		'pro_id',	'skill_id'
    ];


    public function setCategoryAttribute($value)

    {

        $this->attributes['skill_id'] = json_encode($value->skill);

    }


    public function getCategoryAttribute($value)

    {

        return $this->attributes['skill_id'] = json_decode($value);

    }

}

