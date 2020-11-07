@extends('publik.layouts.app')

@section('content')

<div class="container">
  <div class="row mt-4">
  <div class="col-md-4">
    <div class="user">
      <div class="layer-user-2">
        <img src="{{asset('image/'. Auth::user()->Profile->image)}}" class="user-img">
      </div>
      <div class="user-name">{{Auth::user()->Profile->nama}}</div>
      <form method="post" action="/profile-update/{{Auth::user()->Profile->id}}" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="layer-card"><input type="file" name="image" class="form-control"></div>
    </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
        <label><b>Nama : </b></label>
        <input type="text" name="nama" class="form-control" value="{{Auth::user()->Profile->nama}}">
      </div>
      <div class="form-group">
        <label><b>NIS : </b></label>
        <input type="text" disabled name="id" class="form-control" value="{{Auth::user()->Profile->nis}}">
      </div>
      <div class="form-group">
        <label><b>NISN : </b></label>
        <input type="text" disabled name="nisn" class="form-control" value="{{Auth::user()->Profile->nisn}}">
      </div>
      <div class="form-group">
        <label><b>Kelas : </b></label>
        <input type="disabled" disabled name="kelas" class="form-control" value="{{Auth::user()->Profile->kelas->kelas}}">
      </div>
      <div class="form-group">
        <label><b>Jurusan : </b></label>
        <input type="disabled" disabled name="jurusan" class="form-control" value="{{Auth::user()->Profile->jurusan->jurusan}}">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="mt-3">
      <a href="/home" class="button1">Kembali</a>
    </div>
  
  </div>
</div>
</div>



     


@endsection
