<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['id', 'nis', 'user_id', 'nama', 'nisn', 'kelas_id', 'jurusan_id', 'angkatan', 'tanggal_pembukuan', 'image'];
	
    public function setor_tabungan(){
    	return $this->hasMany('App\Setor_tabungan');
    }

    public function tarik_tabungan(){
    	return $this->hasMany('App\Tarik_tabungan');
    }

    public function Kelas(){
    	return $this->belongsTO('App\Kelas');
    }

    public function Jurusan(){
    	return $this->belongsTO('App\Jurusan');
    }

    public function User(){
    	return $this->belongsTO('App\User');
    }

    public function rekap_tahunan(){
        return $this->hasMany('App\rekap_tahunan');
    }
}
