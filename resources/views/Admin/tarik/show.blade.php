@extends('admin.layout.app')
@section('title', 'penarikan')
@section('content')

<h2>Detail Penarikan</h2>

<div class="container">
<div class="card">
  <div class="card-body">
    <table class="table">
        <tbody>
            <tr>
              <td>Nama : </td>
              <td>{{$tarik->profile->nama}}</td>
            <tr>
              <td>ID Tabungan : </td>
              <td>{{$tarik->profile->id}}</td>
            </tr>
            <tr>
              <td>NIS : </td>
              <td>{{$tarik->profile->nis}}</td>
            </tr>
            <tr>
              <td>ID tarikan : </td>
              <td>{{$tarik->id}}</td>
            </tr>
            <tr>
              <td>Jumlah tarikan : </td>
              <td>{{$tarik->jumlah_penarikan}}</td>
            </tr>
            <tr>
              <td>Tanggal tarikan : </td>
              <td>{{$tarik->tanggal_penarikan}}</td>
            </tr>
            <tr>
              <td>Jumlah tarikan : </td>
              <td>{{$tarik->tahun_ajaran->tahun}}</td>
            </tr>
    </table>
  </div>
</div>
<a href="/admin-tarik" class="btn btn-primary">Kembali</a>
</div>

@endsection