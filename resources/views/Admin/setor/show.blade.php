@extends('admin.layout.app')
@section('title', 'setoran')
@section('content')

<h2>Detail Penyetoran</h2>

<div class="container">
  <div class="card">
  <div class="card-body">
    <table class="table">
        <tbody>
            <tr>
              <td>Nama : </td>
              <td>{{$setor->profile->nama}}</td>
            <tr>
              <td>ID Tabungan : </td>
              <td>{{$setor->profile->id}}</td>
            </tr>
            <tr>
              <td>NIS : </td>
              <td>{{$setor->profile->nis}}</td>
            </tr>
            <tr>
              <td>ID Setoran : </td>
              <td>{{$setor->id}}</td>
            </tr>
            <tr>
              <td>Jumlah Setoran : </td>
              <td>{{$setor->jumlah_setoran}}</td>
            </tr>
            <tr>
              <td>Tanggal Setoran : </td>
              <td>{{$setor->tanggal_setoran}}</td>
            </tr>
            <tr>
              <td>Jumlah Setoran : </td>
              <td>{{$setor->tahun_ajaran->tahun}}</td>
            </tr>
    </table>
  </div>
</div>
<a href="/admin-setor" class="btn btn-primary">Kembali</a>
</div>

@endsection