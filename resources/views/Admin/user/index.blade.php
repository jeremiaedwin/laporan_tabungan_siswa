@extends('admin.layout.app')
@section('title', 'Anggota')
@section('content')

<h2>Daftar Anggota</h2>

  <div class="table-responsive">
    <table class="table table-bordered">
        <thead class="thead-danger">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          @foreach($users as $user)
            <tr>
              <th scope="row">{{$no++}}</th>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->password}}</td>
              <td>{{$user->role}}</td>
              <td>
                <a href="/admin-user/{{$user->id}}/edit" class="btn btn-warning"><i class="fas fa-pen"></i></a>
              </td>
              <td>
                <a href="/admin-user/{{$user->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
              </td>
              <td>
                <form action="/admin-user/{{$user->id}}" method="post">
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