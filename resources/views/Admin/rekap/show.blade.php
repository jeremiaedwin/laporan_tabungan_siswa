@extends('admin.layout.app')
@section('title', 'rekapan')
@section('content')

<div class="mt-3 mb-3"><center><h3>Rekap Tabungan Anda Per Tahun</h3></center></div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Rekapan Tabungan </h5>
    <h6 class="card-subtitle mb-2 text-muted">Tahun Ajaran {{$rekapan->tahun_ajaran->tahun}}</h6>
    <table class="table">
    	<tr>
    		<td>ID Profile Tabungan</td>
    		<td>:</td>
    		<td>{{$rekapan->profile->id}}</td>
    	</tr>
    	<tr>
    		<td>Jumlah Setoran Setahun</td>
    		<td>:</td>
    		<td>RP {{Auth::user()->setor_tabungan->sum('jumlah_setoran')}}</td>
    	</tr>
    	<tr>
    		<td>Jumlah Penarikan Setahun</td>
    		<td>:</td>
    		<td>RP {{Auth::user()->tarik_tabungan->sum('jumlah_penarikan')}}</td>
    	</tr>
    	<tr>
    		<td>Jumlah Saldo Akhir</td>
    		<td>:</td>
    		<td>RP {{$rekapan->jumlah_saldo_akhir}}</td>
    	</tr>
    	<tr>
    		<td>Tanggal Rekapan</td>
    		<td>:</td>
    		<td>{{$rekapan->tanggal_rekapan}}</td>
    	</tr>
    </table>
    <a href="#" class="card-link">Download PDF</a>
  </div>
</div>

@endsection