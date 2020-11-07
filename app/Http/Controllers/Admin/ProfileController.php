<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tarik_tabungan;
use App\Setor_tabungan;
use App\User;
use App\Profile;
use App\Kelas;
use App\Jurusan;
use App\Tahun_ajaran;
use PDF;
use Alert;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        $users = User::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('admin.profile.index', ['users'=>$users, 'kelas'=>$kelas, 'jurusan'=>$jurusan, 'profiles'=>$profiles]);
    }

    public function create()
    {
        $users = User::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('admin.profile.create', ['users'=>$users, 'kelas'=>$kelas, 'jurusan'=>$jurusan]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nisn' => 'required',
            'kelas_id' => 'required',
            'jurusan_id' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255|unique:users'
        ]);
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt('12345678');
        $user->remember_token = Str::random(40);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $profiles = Profile::create([ 
            'id' => $request->id,
            'nis' => $request->nis,
            'user_id' => $user->id,
            'nama' => $request->name,
            'nisn' => $request->nisn,
            'kelas_id' => $request->kelas_id,
            'jurusan_id' => $request->jurusan_id,
            'tanggal_pembukuan' => $request->tanggal_pembukuan,
            'angkatan' => $request->angkatan
        ]);
        // if($request->hasFile('image')){
        // $file = $request->file('image');
        // $filename = time().'.'.$file->getClientOriginalExtension();
        // $destinationPath = public_path('\image');
        // $file->move($destinationPath, $filename);
        // $profiles->image = $filename;
        // }
        // $profiles->save();
        return back()->withInfo('data tersimpan');
    }

    public function show($id)
    {
        $profiles = Profile::find($id);
        $users = User::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $setor = Setor_tabungan::where('profile_id', $id)->get();
        $tarik = Tarik_tabungan::where('profile_id', $id)->get();
        return view('admin.profile.show', ['users'=>$users, 'kelas'=>$kelas, 'jurusan'=>$jurusan, 'profiles'=>$profiles, 'setor' => $setor, 'tarik'=>$tarik]);
    }

    public function edit($id)
    {
        $profiles = Profile::find($id);
        $users = User::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('admin.profile.edit', ['users'=>$users, 'kelas'=>$kelas, 'jurusan'=>$jurusan, 'profiles'=>$profiles]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'nisn' => 'required',
            'kelas_id' => 'required',
            'jurusan_id' => 'required'
        ]);

        $profiles = Profile::find($id);
        $profiles->id = $request->id;
        $profiles->nis = $request->nis;
        $profiles->nama = $request->name;
        $profiles->nisn = $request->nisn;
        $profiles->kelas_id = $request->kelas_id;
        $profiles->jurusan_id = $request->jurusan_id;
        $profiles->angkatan = $request->angkatan;
        $profiles->tanggal_pembukuan = $request->tanggal_pembukuan;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('\image');
            $file->move($destinationPath, $filename);
            $profiles->image = $filename;
        }
        $profiles->save();
        return back()->withInfo('data tersimpan');
    }

    public function destroy($id)
    {
        $profiles = Profile::find($id);
        \Storage::delete($$profiles->image);
        $profiles->delete();
        return redirect()->route('profiles.index');
        
    }

    public function cetak_pdf($id){

    $profiles = Profile::find($id);
        $users = User::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $setor = Setor_tabungan::where('profile_id', $id)->get();
        $tarik = Tarik_tabungan::where('profile_id', $id)->get();
    $pdf = PDF::loadview('publik.pdf.profile', ['users'=>$users, 'kelas'=>$kelas, 'jurusan'=>$jurusan, 'profiles'=>$profiles, 'setor' => $setor, 'tarik'=>$tarik]);
    return $pdf->download('laporan-profile-pdf');
    }

}
