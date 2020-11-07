@extends('admin.layout.app')
@section('title', 'Profile')
@section('content')

<h2>Edit Profil</h2>
<div class="container-fluid mt-4">
	<form method="post" action="/admin-profile/{{$profiles->id}}" enctype="multipart/form-data">
		{{csrf_field()}}
		{{method_field('PUT')}}
		<div class="form-group">
			<label>Kode Tabungan : </label>
			<input type="text" name="id" class="form-control" id="id" value="{{$profiles->id}}">
		</div>
		<div class="form-group">
			<label>NIS : </label>
			<input type="text" name="nis" class="form-control" id="id" value="{{$profiles->nis}}">
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Pilih Kelas</label>
				<select name="kelas_id" class="form-control">
					<option value="">Pilih Kelas</option>
					@foreach($kelas as $kls)
					<option value="{{$kls->id}}" <?php if($profiles->kelas_id == $kls->id){echo "selected";}?>>{{$kls->kelas}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-md-4">
				<label>Pilih Jurusan</label>
				<select name="jurusan_id" class="form-control">
					<option value="">Pilih Jurusan</option>
					@foreach($jurusan as $jrs)
					<option value="{{$jrs->id}}" <?php if($profiles->jurusan_id == $jrs->id){echo "selected";}?>>{{$jrs->jurusan}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label>Nama Lengkap</label>
			<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }} {{$profiles->nama}}" required autocomplete="name" autofocus>
			@error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>
		<div class="form-group">
			<label>Email</label>
			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} {{$profiles->user->email}}" required autocomplete="email">
			@error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		<div class="form-group">
			<label>NISN</label>
			<input type="text" name="nisn" class="form-control" id="id" value="{{$profiles->nisn}}">
		</div>
		<div class="form-group">
			<label>Angkatan</label>
			<input type="text" name="angkatan" class="form-control" id="id" value="{{$profiles->angkatan}}">
		</div>
		<div class="form-group">
			<label>Tanggal Pembukuan</label>
			<input type="date" name="tanggal_pembukuan" class="form-control" id="id" value="{{$profiles->tanggal_pembukuan}}">
		</div>
		<div class="form-group">
			<label>Foto : </label>
			<input type="file" name="image" class="form-control">
			<div class="card" style="width: 18rem;">
      <img class="card-img-top" src="{{asset('image/'.$profiles->image)}}" alt="Card image cap">
    </div>
		</div>

		<center>
			<button name="submit" type="submit" class="btn btn-success">Submit</button>
			<a href="/admin-profile" class="btn btn-primary">Kembali</a>
		</center>
	</form>
</div>


@endsection

