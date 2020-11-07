@extends('admin.layout.app')
@section('title', 'setoran')
@section('content')

<h2>Riwayat Penyetoran</h2>

<div class="container">
  <div class="mt-3 mb-3">
    <form method="post" action="/admin-setor/search">
        {{csrf_field()}}
            <div class="form-row">
                <div class="col">
                  <select name="search" class="form-control user">
                    <option value="">Pilih Siswa</option>
                    @foreach($profiles as $profile)
                    <option value="{{$profile->id}}">{{$profile->nama}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Search</button>
                </div>
            </div>
        </form>
        <a href="/setoran/cetak_pdf" target="_blank" class="btn btn-success mt-2">Download PDF</a>
  </div>

  <div class="mt-3">
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered">
          <thead class="thead-danger">
              <tr>
                  <th scope="col">No</th>
                  <th scope="col">ID</th>
                  <th scope="col">Penyetor</th>
                  <th scope="col">Jumlah Setoran</th>
                  <th scope="col">Tanggal Setoran</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Lihat</th>
                  <th scope="col">Hapus</th>
              </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach($setor as $str)
              <tr>
                <th scope="row">{{$no++}}</th>
                <td>{{$str->id}}</td>
                <td>{{$str->profile->nama}}</td>
                <td>{{$str->jumlah_setoran}}</td>
                <td>{{$str->tanggal_setoran}}</td>
                <td>
                  <a href="/admin-setor/{{$str->id}}/edit" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                </td>
                <td>
                  <a href="/admin-setor/{{$str->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                </td>
                <td>
                  <form action="/admin-setor/{{$str->id}}" method="post">
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

@section('script')
<script type="text/javascript">
  $(".user").select2();
</script>


@endsection