<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor_tabungan extends Model
{
    protected $tables = "setor_tabungans";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function user(){
    	return $this->belongsToMany('App\User');
    }

    public function profile(){
    	return $this->belongsTo('App\Profile');
    }

    public function tahun_ajaran(){
    	return $this->belongsTo('App\Tahun_ajaran');
    }

    public function rekap_tahunan(){
        return $this->hasMany('App\Rekap_tahunan');
    }
}
