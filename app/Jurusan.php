<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
	public $timestamps = false;
	
    public function profile(){
    	return $this->hasOne('App\Profile');
    }
}
