@extends('admin.layout.app')
@section('title', 'Anggota')
@section('content')

<h2>Detail Anggota</h2>
<a href="/admin-profile/{{$profiles->id}}/cetak_pdf" target="_blank" >Cetak PDF</a>
<a href="/admin-rekap/{{$profiles->id}}/create" class="btn btn-primary">Buat Rekapan</a>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="{{asset('image/'.$profiles->image)}}" alt="Card image cap">
        </div>
      </div>
      <div class="col-8">
        <table class="table">
          <tbody>
              <tr>
                <td>Nama : </td>
                <td>{{$profiles->nama}}</td>
              <tr>
              <tr>
                <td>Email : </td>
                <td>{{$profiles->user->email}}</td>
              <tr>
              <tr>
                <td>Role : </td>
                <td>{{$profiles->user->role}}</td>
              <tr>
                <td>NIS : </td>
                <td>{{$profiles->nis}}</td>
              </tr>
              <tr>
                <td>NISN : </td>
                <td>{{$profiles->nisn}}</td>
              </tr>
              <tr>
                <td>Kelas : </td>
                <td>{{$profiles->kelas->kelas}}</td>
              </tr>
              <tr>
                <td>Jurusan : </td>
                <td>{{$profiles->jurusan->jurusan}}</td>
              </tr>
              <tr>
                <td>Tanggal Pembukuan : </td>
                <td>{{$profiles->tanggal_pembukuan}}</td>
              </tr>
            </tbody>
        </table>
      </div>
    </div>







    <div class="row">
      <div class="col-6">
        <div class="card mt-5">
          <div class="card-head bg-primary text-white">
            <center><h5 class="mt-2 align-center">Riwayat Setoran</h5></center>
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <thead class="thead-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID</th>
                        <th scope="col">Jumlah Setoran</th>
                        <th scope="col">Tanggal Setoran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach($setor as $str)
                    <tr>
                      <th scope="row">{{$no++}}</th>
                      <td>{{$str->id}}</td>
                      <td>{{$str->jumlah_setoran}}</td>
                      <td>{{$str->tanggal_setoran}}</td>
                      <td>
                        <a href="/admin-setor/{{$str->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                      </td>
                    </tr>
                    @endforeach
                    <tr class="bg-primary text-white">
                      <td>Total</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>{{$setor->sum('jumlah_setoran')}}</td>
                    </tr>
                </tbody>
            </table>
          </div>
      </div>
      </div>
      <div class="col-6">
        <div class="card mt-5">
          <div class="card-head bg-warning text-white">
            <center><h5 class="mt-2 align-center">Riwayat Penarikan</h5></center>
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <thead class="thead-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID</th>
                        <th scope="col">Jumlah Penarikan</th>
                        <th scope="col">Tanggal Penarikan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach($tarik as $trk)
                    <tr>
                      <th scope="row">{{$no++}}</th>
                      <td>{{$trk->id}}</td>
                      <td>{{$trk->jumlah_penarikan}}</td>
                      <td>{{$trk->tanggal_penarikan}}</td>
                      <td>
                        <a href="/admin-tarik/{{$str->id}}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                      </td>
                    </tr>
                    @endforeach
                    <tr class="bg-warning text-white">
                      <td>Total</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>{{$tarik->sum('jumlah_penarikan')}}</td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection