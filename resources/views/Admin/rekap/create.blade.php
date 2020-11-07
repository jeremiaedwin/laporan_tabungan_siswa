@extends('admin.layout.app')
@section('title', 'Rekap')
@section('content')

<h2>Tambah Rekapan</h2>
<div class="container-fluid mt-4">
	<form method="post" action="/admin-rekap">
		{{csrf_field()}}
		<div>
			<input type="hidden" name="id" class="form-control" id="id">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label>Anggota</label>
				<input type="text" disabled name="" value="{{$profiles->nama}}" class="form-control">
				<input type="hidden" name="profile_id" value="{{$profiles->id}}">
			</div>
			<div class="form-group col-md-6">
				<label>User</label>
				<input type="text" disabled name="" value="{{$profiles->user->email}}" class="form-control">
				<input type="hidden" name="user_id" value="{{$profiles->user->id}}">
			</div>
		</div>
		<div class="form-group">
			<label>Jumlah Setoran Tahun Ini</label>
			<input type="number" name="jumlah_setoran" class="form-control" value="{{$profiles->setor_tabungan->sum('jumlah_setoran')}}">
		</div>
		<div class="form-group">
			<label>Jumlah Penarikan Tahun Ini</label>
			<input type="number" name="jumlah_penarikan" class="form-control" value="{{$profiles->tarik_tabungan->sum('jumlah_penarikan')}}">
		</div>
		<div class="form-group">
			<label>Jumlah Penarikan Saldo Akhir</label>
			<input type="number" name="jumlah_saldo_akhir" class="form-control" value="{{$profiles->setor_tabungan->sum('jumlah_setoran')-$profiles->tarik_tabungan->sum('jumlah_penarikan')}}">
		</div>
		<div class="form-group">
			<label>Pilih Tahun Ajaran</label>
			<select name="tahun_ajaran_id" class="form-control">
				<option value="">Pilih Tahun Ajaran</option>
				@foreach($tahun_ajaran as $tahun)
				<option value="{{$tahun->id}}">{{$tahun->tahun}}</option>
				@endforeach
			</select>
		</div>
		<center>
			<button name="submit" type="submit" class="btn btn-success">Submit</button>
			<a href="/admin-rekap" class="btn btn-primary">Kembali</a>
		</center>
	</form>
</div>


@endsection


@section('js')

<script type="text/javascript">
	var x = Math.floor(Math.random() * 10000);
	var i ="rkp" + x;

	document.getElementById("id").value = i ;
</script>

@endsection