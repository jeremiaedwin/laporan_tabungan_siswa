<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahun_ajaran extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function setor_tabungan(){
    	return $this->hasMany('App\Setor_tabungan');
    }

    public function tarik_tabungan(){
    	return $this->hasMany('App\Tarik_tabungan');
    }

    public function rekap_tahunan(){
        return $this->hasMany('App\Rekap_tahunan');
    }
}
