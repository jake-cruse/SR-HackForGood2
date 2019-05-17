<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
	protected $table = 'classes';
	
    public function members()
    {
        return $this->hasMany("App\User");   
    }
}
