<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tarik_tabungan;
use App\User;
use App\Profile;
use App\Tahun_ajaran;
use Alert;
use Auth;
use PDF;

class tarikController extends Controller
{
    public function index()
    {
        $tarik = Tarik_tabungan::all();
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        return view('admin.tarik.index', ['profiles'=>$profiles, 'users'=>$users, 'tahun_ajaran'=>$tahun_ajaran, 'tarik'=>$tarik]);
    }

    public function create()
    {
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        return view('admin.tarik.create', ['profiles'=>$profiles, 'users'=>$users, 'tahun_ajaran'=>$tahun_ajaran]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'profile_id' => 'required',
            'jumlah_penarikan' => 'required',
            'tanggal_penarikan' => 'required',
            'tahun_ajaran_id' => 'required',
        ]);

        $tarik = new Tarik_tabungan;
        $tarik->id = $request->id;
        $tarik->profile_id = $request->profile_id;
        $tarik->jumlah_penarikan = $request->jumlah_penarikan;
        $tarik->tanggal_penarikan = $request->tanggal_penarikan;
        $tarik->tahun_ajaran_id = $request->tahun_ajaran_id;
        $tarik->save();
        $tarik->user()->sync($request->user);
        Alert::success('Success', 'Data Tersimpan');
        return back()->withInfo("Data Berhasil Dibuat..!");;

    }

    public function show($user_id)
    {
        $tarik = Tarik_tabungan::find($user_id);
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        return view('admin.tarik.show', ['profiles'=>$profiles, 'users'=>$users, 'tahun_ajaran'=>$tahun_ajaran, 'tarik'=>$tarik]);
    }

    public function edit($id)
    {
        $tarik = Tarik_tabungan::find($id);
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        return view('admin.tarik.edit', ['profiles'=>$profiles, 'users'=>$users, 'tahun_ajaran'=>$tahun_ajaran, 'tarik'=>$tarik]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user' => 'required',
            'profile_id' => 'required',
            'jumlah_penarikan' => 'required',
            'tanggal_penarikan' => 'required',
            'tahun_ajaran_id' => 'required',
        ]);

        $tarik = Tarik_tabungan::find($id);
        $tarik->profile_id = $request->profile_id;
        $tarik->jumlah_penarikan = $request->jumlah_penarikan;
        $tarik->tanggal_penarikan = $request->tanggal_penarikan;
        $tarik->tahun_ajaran_id = $request->tahun_ajaran_id;
        $tarik->save();
        $tarik->user()->sync($request->user);
        Alert::success('Success', 'Data Tersimpan');
        return back()->withInfo("Data Berhasil Dibuat..!");;
    }

    public function destroy($id)
    {
        $tarik = Tarik_tabungan::find($id);
        $tarik->delete();
        $tarik->user()->detach();
        Alert::success('Success', 'Data Terhapus'); 
        return redirect()->route('admin-tarik.index');
    }

    public function test(){
        $users= User::all();
        return view('admin.test.test', ['users'=>$users]);
    }

    public function test_total($id){
        $total = User::get()->where('id', $id);
        return view('admin.test.test2', ['total'=>$total]);
    }

    function search(Request $request){
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        $query = $request->input('search');
        $tarik = Tarik_tabungan::where('profile_id', 'LIKE', '%'.$query.'%')->get();
        return view('admin.tarik.index', ['profiles'=>$profiles, 'users'=>$users, 'tahun_ajaran'=>$tahun_ajaran, 'tarik'=>$tarik]);
    }

    public function cetak_pdf(){
    $tarik = Tarik_tabungan::all();
    $pdf = PDF::loadview('admin.pdf.tarikan_index',['tarik'=>$tarik]);
    return $pdf->download('daftar-laporan-penarikan-pdf');
    }
}
