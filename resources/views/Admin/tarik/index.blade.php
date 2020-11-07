@extends('admin.layout.app')
@section('title', 'penarikan')
@section('content')

<h2>Riwayat Penarikan</h2>

<div class="container">
  <div>
    <form method="post" action="/admin-tarik/search">
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
        <a href="/tarikan/cetak_pdf" target="_blank" class="btn btn-success mt-2">Download PDF</a>
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
                <th scope="col">Jumlah penarikan</th>
                <th scope="col">Tanggal penarikan</th>
                <th scope="col">Aksi</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          @foreach($tarik as $trk)
            <tr>
              <th scope="row">{{$no++}}</th>
              <td>{{$trk->id}}</td>
              <td>{{$trk->profile->nama}}</td>
              <td>{{$trk->jumlah_penarikan}}</td>
              <td>{{$trk->tanggal_penarikan}}</td>
              <td>
                <a href="/admin-tarik/{{$trk->id}}/edit" class="btn btn-warning"><i class="fas fa-pen"></i></a>
              </td>
              <td>
                <a href="/admin-tarik/{{$trk->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
              </td>
              <td>
                <form action="/admin-tarik/{{$trk->id}}" method="post">
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