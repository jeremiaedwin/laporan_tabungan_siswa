<?php

namespace App\Http\Controllers\publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Tarik_tabungan;
use App\Setor_tabungan;
use App\Rekap_tahunan;
use App\User;
use App\Profile;
use App\Kelas;
use App\Jurusan;
use App\Tahun_ajaran;
use Alert;
use PDF;
use Auth;


class RekapController extends Controller
{
    
    public function index()
    {
    //     $date = Carbon::now();
    //     $penarikan1 = Auth::user()->Tarik_tabungan()->whereYear('tanggal_penarikan', '=', Carbon::parse($date)->format('Y'))->get();
    //     $penarikan = Auth::user()->Tarik_tabungan()->orderBy('tanggal_penarikan', 'asc')->get();
    //     $setoran1 = Auth::user()->Setor_tabungan()->whereYear('tanggal_setoran', '=', Carbon::parse($date)->format('Y'))->get();
    //     $setoran = Auth::user()->Setor_tabungan()->orderBy('tanggal_setoran', 'asc')->get();

    //     //series
    //     $bulan = [];
    //     $setoran2 = [];
    //     $penarikan2 = [];



    //     foreach ($setoran as $str) 
    //         if($str->tahun_ajaran->status == 'active'){
    //         $setoran2[] = $str->jumlah_setoran;
            
    //     }

    //     foreach ($penarikan as $trk) 
    //         if($trk->tahun_ajaran->status == 'active'){
    //         $penarikan2[] = $trk->jumlah_penarikan;
            
    //     }

    //     return view('publik.rekap.index', compact('penarikan2', 'date', 'penarikan', 'setoran', 'setoran2', 'bulan'));

        $rekap = Rekap_tahunan::all();
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        $setoran = Setor_tabungan::all();
        $tarikan = Tarik_tabungan::all();
        return view('publik.rekap.index', compact('rekap', 'users', 'profiles', 'tahun_ajaran', 'setoran', 'tarikan'));
    }



   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
