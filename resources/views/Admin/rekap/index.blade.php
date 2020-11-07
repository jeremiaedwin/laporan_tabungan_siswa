@extends('admin.layout.app')
@section('title', 'rekapan')
@section('content')

<h2>Riwayat Rekapan</h2>

<div class="container">
  <div>
    <form method="post" action="/admin-setor/search">
        {{csrf_field()}}
            <div class="form-row">
                <div class="col">
                    <input type="text" name="search" class="form-control" placeholder="yyyy-MM-dd">
                </div>
                <div class="col">
                    <button type="submit" name="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
  </div>
    <table class="table">
        <thead class="thead-danger">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">NIS</th>
                <th scope="col">NAMA</th>
                <th scope="col">TAHUN</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          @foreach($rekap as $rkp)
            <tr>
              <th scope="row">{{$no++}}</th>
              <td>{{$rkp->id}}</td>
              <td>{{$rkp->profile->nis}}</td>
              <td>{{$rkp->profile->nama}}</td>
              <td>{{$rkp->tahun_ajaran->tahun}}</td>
              <td>
                <a href="/admin-setor/{{$rkp->id}}/edit" class="btn btn-warning"><i class="fas fa-pen"></i></a>
              </td>
              <td>
                <a href="/admin-rekap/{{$rkp->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
              </td>
              <td>
                <form action="/admin-setor/{{$rkp->id}}" method="post">
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

@endsection