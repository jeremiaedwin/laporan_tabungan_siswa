<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rekap_tahunan;
use App\Setor_tabungan;
use App\Tarik_tabungan;
use App\User;
use App\Profile;
use App\Tahun_ajaran;
use App\Jurusan;
use Alert;
use Auth;

class RekapController extends Controller
{

    public function index()
    {
        $rekap = Rekap_tahunan::all();
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        $setoran = Setor_tabungan::all();
        $tarikan = Tarik_tabungan::all();
        return view('admin.rekap.index', compact('rekap', 'users', 'profiles', 'tahun_ajaran', 'setoran', 'tarikan'));
    }

    public function create($id)
    {
        $users = User::all();
        $profiles = Profile::find($id);
        $tahun_ajaran = Tahun_ajaran::all();
        $setoran = Setor_tabungan::where('profile_id', $id)->get();
        $tarikan = Tarik_tabungan::where('profile_id', $id)->get();
        return view('admin.rekap.create', compact('users', 'profiles', 'tahun_ajaran', 'setoran', 'tarikan'));
    }

    public function store(Request $request)
    {
        $rekap = new Rekap_tahunan;
        $rekap->id = $request->id;
        $rekap->profile_id = $request->profile_id;
        $rekap->user_id = $request->user_id;
        $rekap->jumlah_setoran = $request->jumlah_setoran;
        $rekap->jumlah_penarikan = $request->jumlah_penarikan;
        $rekap->jumlah_saldo_akhir = $request->jumlah_saldo_akhir;
        $rekap->tahun_ajaran_id = $request->tahun_ajaran_id;
        $rekap->save();
        return back()->withInfo('data berhasil ditambahkan');
    }

    public function show($id)
    {
        $rekapan = Rekap_tahunan::find($id);
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        $setoran = Setor_tabungan::where('profile_id', $id)->get();
        $tarikan = Tarik_tabungan::where('profile_id', $id)->get();
        return view('admin.rekap.show', compact('rekapan', 'users', 'profiles', 'tahun_ajaran', 'setoran', 'tarikan'));   
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
