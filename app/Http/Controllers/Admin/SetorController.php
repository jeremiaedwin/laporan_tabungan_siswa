<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setor_tabungan;
use App\User;
use App\Profile;
use App\Tahun_ajaran;
use Alert;
use Auth;
use PDF;

class SetorController extends Controller
{
    public function index()
    {
        $setor = Setor_tabungan::orderBy('tanggal_setoran', 'asc')->get();
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        return view('admin.setor.index', ['profiles'=>$profiles, 'users'=>$users, 'tahun_ajaran'=>$tahun_ajaran, 'setor'=>$setor]);
    }

    public function create()
    {
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        return view('admin.setor.create', ['profiles'=>$profiles, 'users'=>$users, 'tahun_ajaran'=>$tahun_ajaran]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'profile_id' => 'required',
            'jumlah_setoran' => 'required',
            'tanggal_setoran' => 'required',
            'tahun_ajaran_id' => 'required',
        ]);

        $setor = new Setor_tabungan;
        $setor->id = $request->id;
        $setor->profile_id = $request->profile_id;
        $setor->jumlah_setoran = $request->jumlah_setoran;
        $setor->tanggal_setoran = $request->tanggal_setoran;
        $setor->tahun_ajaran_id = $request->tahun_ajaran_id;
        $setor->save();
        $setor->user()->sync($request->user);
        Alert::success('Success', 'Data Tersimpan');
        return back()->withInfo("Data Berhasil Dibuat..!");;

    }

    public function show($user_id)
    {
        $setor = Setor_tabungan::find($user_id);
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        return view('admin.setor.show', ['profiles'=>$profiles, 'users'=>$users, 'tahun_ajaran'=>$tahun_ajaran, 'setor'=>$setor]);
    }

    public function edit($id)
    {
        $setor = Setor_tabungan::find($id);
        $users = User::all();
        $profiles = Profile::all();
        $tahun_ajaran = Tahun_ajaran::all();
        return view('admin.setor.edit', ['profiles'=>$profiles, 'users'=>$users, 'tahun_ajaran'=>$tahun_ajaran, 'setor'=>$setor]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user' => 'required',
            'profile_id' => 'required',
            'jumlah_setoran' => 'required',
            'tanggal_setoran' => 'required',
            'tahun_ajaran_id' => 'required',
        ]);

        $setor = Setor_tabungan::find($id);
        $setor->profile_id = $request->profile_id;
        $setor->jumlah_setoran = $request->jumlah_setoran;
        $setor->tanggal_setoran = $request->tanggal_setoran;
        $setor->tahun_ajaran_id = $request->tahun_ajaran_id;
        $setor->save();
        $setor->user()->sync($request->user);
        Alert::success('Success', 'Data Tersimpan');
        return back()->withInfo("Data Berhasil Dibuat..!");;
    }

    public function destroy($id)
    {
        $setor = Setor_tabungan::find($id);
        $setor->delete();
        $setor->user()->detach();
        Alert::success('Success', 'Data Terhapus'); 
        return redirect()->route('admin-setor.index');
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
        $setor = Setor_tabungan::where('profile_id', 'LIKE', '%'.$query.'%')->get();
        return view('admin.setor.index', ['profiles'=>$profiles, 'users'=>$users, 'tahun_ajaran'=>$tahun_ajaran, 'setor'=>$setor]);
    }

    public function cetak_pdf(){
    $setor = Setor_tabungan::all();
    $pdf = PDF::loadview('admin.pdf.setoran_index',['setor'=>$setor]);
    return $pdf->download('daftar-laporan-setoran-pdf');
    }
}
