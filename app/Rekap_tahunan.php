<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekap_tahunan extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function setor_tabungan(){
    	return $this->belongsTo('App\Setor_tabungan');
    }
    public function tarik_tabungan(){
    	return $this->belongsTo('App\Tarik_tabungan');
    }
    public function profile(){
    	return $this->belongsTo('App\Profile');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function tahun_ajaran(){
        return $this->belongsTo('App\Tahun_ajaran');
    }
}
