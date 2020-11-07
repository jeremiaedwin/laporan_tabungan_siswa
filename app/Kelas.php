<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
	public $timestamps = false;
	
    public function profile(){
    	return $this->hasMany('App\Profile');
    }
}
