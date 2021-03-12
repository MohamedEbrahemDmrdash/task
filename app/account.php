<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    public function tests(){
    	return $this->hasMany(Test::class);
    }
}
