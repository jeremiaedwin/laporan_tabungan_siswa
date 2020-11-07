@extends('admin.layout.app')
@section('title', 'tahun ajaran')
@section('content')

<h2>Tambah Tahun Ajaran</h2>
<div class="container-fluid mt-4">
	<form method="post" action="/tahun_ajaran">
		{{csrf_field()}}
		<div>
			<label>ID</label>
			<input type="text" name="id" class="form-control" id="id">
		</div>
		<div>
			<label>Tahun</label>
			<input type="text" name="tahun" class="form-control" id="id">
		</div>
		<div class="form-group">
			<label>Pilih Status</label>
			<select name="status" class="form-control">
				<option value="">Pilih Status</option>
				<option value="active">Active</option>
				<option value="not active">Not Active</option>
			</select>
		</div>
		<center>
			<button name="submit" type="submit" class="btn btn-success">Submit</button>
			<a href="/admin-tarik" class="btn btn-primary">Kembali</a>
		</center>
	</form>

	<table class="table mt-4">
        <thead class="thead-danger">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Tahun</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          @foreach($tahun_ajarans1 as $tahun)
            <tr>
              <th scope="row">{{$no++}}</th>
              <td>{{$tahun->id}}</td>
              <td>{{$tahun->tahun}}</td>
              <td>
              	<form method="post" action="/tahun_ajaran/{{$tahun->id}}/update">
              		{{csrf_field()}}
              		<select name="status" class="form-control">
              			<option value="{{$tahun->id}}" <?php if($tahun){echo "selected";}?>>{{$tahun->status}}</option>
                    <option value="active">active</option>
                    <option value="not active">not active</option>
              		</select>
              </td>
              <td><button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-pen"></i></button></td>
              </form>
              <td>
                <form action="/admin-tahun/{{$tahun->id}}" method="post">
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
