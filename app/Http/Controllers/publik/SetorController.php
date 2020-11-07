<?php

namespace App\Http\Controllers\publik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Tarik_tabungan;
use App\Setor_tabungan;
use App\User;
use App\Profile;
use App\Kelas;
use App\Jurusan;
use App\Tahun_ajaran;
use Alert;
use PDF;
use Auth;

class SetorController extends Controller
{
    public function index_pertahun(){
    	$date = Carbon::now();
    	$setoran = Auth::user()->Setor_tabungan()->whereYear('tanggal_setoran', '=', Carbon::parse($date)->format('Y'))->get();
    	
    	return view('publik.setoran.index', compact('setoran', 'date'));
    }

    public function index(){
    	$date = Carbon::now();
    	$setoran1 = Auth::user()->Setor_tabungan()->whereYear('tanggal_setoran', '=', Carbon::parse($date)->format('Y'))->get();
    	$setoran = Auth::user()->Setor_tabungan;
    	$setoran2 = Auth::user()->Setor_tabungan;
    	return view('publik.setoran.index', compact('setoran', 'date', 'setoran2'));
    }

    public function cetak_pdf($id){
    $str = Setor_tabungan::find($id);
    $pdf = PDF::loadview('publik.pdf.setoran_pdf',['str'=>$str]);
    return $pdf->download('laporan-setoran-pdf');
    }
}
