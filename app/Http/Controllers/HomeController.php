<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Kelas;
use App\Jurusan;
use App\Tahun_ajaran;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profiles = Profile::all();
        $users = User::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $penarikan = Auth::user()->Tarik_tabungan()->orderBy('tanggal_penarikan', 'asc')->get();
        $setoran = Auth::user()->Setor_tabungan()->orderBy('tanggal_setoran', 'asc')->get();
        $setoran2 = [];
        $penarikan2 = [];
        foreach ($setoran as $str) 
            if($str->tahun_ajaran->status == 'active'){
            $setoran2[] = $str->jumlah_setoran;
            
        }

        foreach ($penarikan as $trk) 
            if($trk->tahun_ajaran->status == 'active'){
            $penarikan2[] = $trk->jumlah_penarikan;
        }
            
        return view('home', ['users'=>$users, 'kelas'=>$kelas, 'jurusan'=>$jurusan, 'profiles'=>$profiles, 'setoran'=>$setoran, 'setoran2'=>$setoran2, 'penarikan'=>$penarikan, 'penarikan2'=>$penarikan2]);
    }
}
