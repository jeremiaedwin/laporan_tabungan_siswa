@extends('admin.layout.app')
@section('title', 'setoran')
@section('content')

<h2>Daftar Akun</h2>

<div class="container">
    <table class="table">
        <thead class="thead-danger">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">name</th>
                <th scope="col">setoran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          @foreach($total as $total)
            <tr>
              <th scope="row">{{$no++}}</th>
              <td>{{$total->id}}</td>
              <td>{{$total->name}}</td>
              <td>
              	{{$total->setor_tabungan->sum('jumlah_setoran')}}	
              <td>
                <a href="/admin/{{$total->id}}/test" class="btn btn-warning"><i class="fas fa-pen"></i></a>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection