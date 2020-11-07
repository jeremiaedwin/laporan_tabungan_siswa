<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Setor_tabungan;
use App\Tarik_tabungan;
use App\User;
use App\Profile;
use App\Tahun_ajaran;
use App\Jurusan;
use Alert;
use Auth;

class DashboardController extends Controller
{
    
    public function index()
    {
        $totalSetoran = Setor_tabungan::orderBy('tanggal_setoran', 'asc')->get();
        $totalTarikan = Tarik_tabungan::all();
        $totalSiswa = Profile::all();
        $tahunAjaran = Tahun_ajaran::all();
        $jurusan = Jurusan::all();
        $jurusan1 = Profile::all();

        //series
        $setoran = [];
        $setoran2= [];
        $tarikan1 = [];
        $tarikan2 = [];
        $jurusanRPL = [];   
        $jurusanAll = [];

        foreach ($totalSetoran as $str) {
            $setoran[] = $str->jumlah_setoran;
        }

        foreach ($totalTarikan as $trk) {
            $tarikan[] = $trk->jumlah_penarikan;
        }

        foreach ($jurusan as $jrs) {
            $jurusanAll[] = $jrs->jurusan;
            $jurusanEuy[] = $jurusan1->where('jurusan_id', $jrs->id)->count();
        }
        $jurusanRPL[] = $jurusan1->where('jurusan_id', 1)->count();
        $total[] = $totalSetoran->sum('jumlah_setoran') - $totalTarikan->sum('jumlah_penarikan');

        return view('admin.dashboard.index', ['totalSetoran' => $totalSetoran,  'totalTarikan'=>$totalTarikan, 'totalSiswa' => $totalSiswa, 'setoran'=>$setoran, 'tarikan'=>$tarikan, 'total'=>$total, 'jurusan'=>$jurusan, 'jurusan1'=>$jurusan1, 'jurusanEuy'=>$jurusanEuy, 'jurusanAll'=>$jurusanAll]);
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
