<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tahun_ajaran;

class TahunController extends Controller
{
    public function create(){
    	$tahun_ajarans = New Tahun_ajaran;
    	$tahun_ajarans1 = Tahun_ajaran::all();
    	return view('admin.tahun_ajaran.create' , ['tahun_ajarans' => $tahun_ajarans, 'tahun_ajarans1' => $tahun_ajarans1]);
    }

    public function store(Request $request){
    	$tahun_ajarans = New Tahun_ajaran;
    	$tahun_ajarans->id = $request->id;
    	$tahun_ajarans->tahun = $request->tahun;
    	$tahun_ajarans->status = $request->status;
    	$tahun_ajarans->save();
    	return back()->withInfo('Data Tersimpan');
    }

    public function update(Request $request, $id){
        $tahun_ajarans = Tahun_ajaran::find($id);
        $tahun_ajarans->status = $request->status;
        $tahun_ajarans->save();
        return back()->withInfo('Data Tersimpan');
    }
}
