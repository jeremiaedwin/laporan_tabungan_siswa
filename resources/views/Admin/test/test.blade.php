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
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          @foreach($users as $user)
            <tr>
              <th scope="row">{{$no++}}</th>
              <td>{{$user->id}}</td>
              <td>
                <a href="/admin/{{$user->id}}/test" class="btn btn-warning"><i class="fas fa-pen"></i></a>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection