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
use Auth;
use PDF;

class TarikController extends Controller
{
    public function index(){
    	$date = Carbon::now();
    	$penarikan1 = Auth::user()->Tarik_tabungan()->whereYear('tanggal_penarikan', '=', Carbon::parse($date)->format('Y'))->get();
    	$penarikan = Auth::user()->Tarik_tabungan;
    	$penarikan2 = Auth::user()->Tarik_tabungan;
    	return view('publik.penarikan.index', compact('penarikan2', 'date', 'penarikan'));
    }

    public function cetak_pdf($id){
    $trk = Setor_tabungan::find($id);
    $pdf = PDF::loadview('publik.pdf.setoran_pdf',['trk'=>$trk]);
    return $pdf->download('laporan-setoran-pdf');
    }
}
