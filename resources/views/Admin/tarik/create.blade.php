@extends('admin.layout.app')
@section('title', 'penarikan')
@section('content')

<h2>Tambah penarikan</h2>
<div class="container-fluid mt-4">
	<div class="card">
  		<div class="card-body">
			<form method="post" action="/admin-tarik">
				{{csrf_field()}}
				<div>
					<input type="hidden" name="id" class="form-control" id="id">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Pilih Anggota</label>
						<select name="profile_id" class="form-control">
							<option value="">Pilih Anggota</option>
							@foreach($profiles as $profile)
							<option value="{{$profile->id}}">{{$profile->nama}}, {{$profile->id}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Pilih User</label>
						<select name="user[]" class="form-control">
							<option value="">Pilih User</option>
							@foreach($users as $user)
							<option value="{{$user->id}}">{{$user->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>Jumlah penarikan</label>
					<input type="number" name="jumlah_penarikan" class="form-control">
				</div>
				<div class="form-group">
					<label>Tanggal penarikan</label>
					<input type="date" name="tanggal_penarikan" class="form-control">
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
					<a href="/admin-tarik" class="btn btn-primary">Kembali</a>
				</center>
			</form>
		</div>
	</div>
</div>


@endsection


@section('js')

<script type="text/javascript">
	var x = Math.floor(Math.random() * 10000);
	var i ="trk" + x;

	document.getElementById("id").value = i ;
</script>

@endsection