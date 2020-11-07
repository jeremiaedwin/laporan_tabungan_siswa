<?php

namespace App\Http\Controllers\publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tarik_tabungan;
use App\Setor_tabungan;
use App\User;
use App\Profile;
use App\Kelas;
use App\Jurusan;
use App\Tahun_ajaran;
use Alert;
use Auth;

class ProfileController extends Controller
{
    public function show($id)
    {
    	$profiles = Profile::find($id);
        $users = User::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $setor = Setor_tabungan::where('profile_id', $id)->get();
        $tarik = Tarik_tabungan::where('profile_id', $id)->get();
        return view('publik.setting.profile', ['users'=>$users, 'kelas'=>$kelas, 'jurusan'=>$jurusan, 'profiles'=>$profiles, 'setor' => $setor, 'tarik'=>$tarik]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $profiles = Profile::find($id);
        $profiles->nisn = $request->nisn;
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
}
