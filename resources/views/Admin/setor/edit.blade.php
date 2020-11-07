@extends('admin.layout.app')
@section('title', 'Setoran')
@section('content')

<h2>Tambah Setoran</h2>
<div class="container-fluid mt-4">
	<div class="card">
  		<div class="card-body">
			<form method="post" action="/admin-setor/{{$setor->id}}">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<div>
					<label>ID</label>
					<input type="text" name="id" class="form-control" value="{{$setor->id}}">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Pilih Anggota</label>
						<select name="profile_id" class="form-control">
							<option value="">Pilih Anggota</option>
							@foreach($profiles as $profile)
							<option value="{{$profile->id}}" <?php if($setor->profile_id == $profile->id) { echo "selected";} ?>>{{$profile->nama}}, {{$profile->id}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Pilih User</label>
						<select name="user[]" class="form-control user">
							<option value="">Pilih User</option>
							@foreach($users as $user)
							<option value="{{$user->id}}">{{$user->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>Jumlah Setoran</label>
					<input type="number" name="jumlah_setoran" class="form-control" value="{{$setor->jumlah_setoran}}">
				</div>
				<div class="form-group">
					<label>Tanggal Setoran</label>
					<input type="date" name="tanggal_setoran" class="form-control" value="{{date('Y-m-d',strtotime($setor['tanggal_setoran']))}}">
				</div>
				<div class="form-group">
					<label>Pilih Tahun Ajaran</label>
					<select name="tahun_ajaran_id" class="form-control">
						<option value="">Pilih Tahun Ajaran</option>
						@foreach($tahun_ajaran as $tahun)
						<option value="{{$tahun->id}}" <?php if($setor->tahun_ajaran_id == $tahun->id) { echo "selected";} ?>>{{$tahun->tahun}}</option>
						@endforeach
					</select>
				</div>
				<center>
					<button name="submit" type="submit" class="btn btn-success">Submit</button>
					<a href="/admin-setor" class="btn btn-primary">Kembali</a>
				</center>
			</form>
		</div>
	</div>
</div>


@endsection

@section('script')
<script type="text/javascript">
	$(".user").select2().val({!!json_encode($setor->user()->allRelatedIds())!!}).trigger('change');
</script>


@endsection