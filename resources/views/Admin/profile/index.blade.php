@extends('admin.layout.app')
@section('title', 'Anggota')
@section('content')

<h2>Daftar Anggota</h2>

<div class="container">
  <div class="card">
    <div class="card-body">
       <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Tabungan</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">NISN</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Angkatan</th>
                <th scope="col">Tanggal Pembukuan</th>
                <th scope="col">Edit</th>
                <th>Lihat</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody class="tbody-white">
          <?php $no = 1; ?>
          @foreach($profiles as $profile)
            <tr>
              <th scope="row">{{$no++}}</th>
              <td>{{$profile->id}}</td>
              <td>{{$profile->nis}}</td>
              <td>{{$profile->nama}}</td>
              <td>{{$profile->nisn}}</td>
              <td>{{$profile->kelas->kelas}}</td>
              <td>{{$profile->jurusan->jurusan}}</td>
              <td>{{$profile->angkatan}}</td>
              <td>{{$profile->tanggal_pembukuan}}</td>
              <td>
                <a href="/admin-profile/{{$profile->id}}/edit" class="btn btn-warning"><i class="fas fa-pen"></i></a>
              </td>
              <td>
                <a href="/admin-profile/{{$profile->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
              </td>
              <td>
                <form action="/admin-profile/{{$profile->id}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
  </div>
</div>

@endsection