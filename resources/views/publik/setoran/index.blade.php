@extends('publik.layouts.app')

@section('content')

@section('content')

<div class="mt-3">
  <div class="tab-trigger">
    <ul>
      <li><label for="tab1">Riwayat Setoran</label></li>
      <li><label for="tab2">Setoran Tahun Ini</label></li>
      <li><label for="tab3">Detail Setoran</label></li>
    </ul>
  </div>
  <div class="tab-container-wrap">
    <input type="radio" name="1" checked="" id="tab1">
    <div class="tab-content-box"> 
      <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">Kode Tabungan</th>
                <th scope="col">Jumlah Setoran</th>
                <th scope="col">Tanggal Setoran</th>
                <th scope="col">Tahun</th>
            </tr>
        </thead>
        <tbody>
            @foreach($setoran as $str)
            <tr>
              <td>{{$str->id}}</td>
              <td>{{$str->profile->id}}</td>
              <td>Rp {{$str->jumlah_setoran}}</td>
              <td>{{$str->tanggal_setoran}}</td>
              <td>{{$str->tahun_ajaran->tahun}}</td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    </div>
    <input type="radio" name="1" id="tab2">
    <div class="tab-content-box"> 
      <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">Kode Tabungan</th>
                <th scope="col">Jumlah Setoran</th>
                <th scope="col">Tanggal Setoran</th>
                <th scope="col">Tahun</th>
            </tr>
        </thead>
        <tbody>
            @foreach($setoran2 as $str)
            @if($str->tahun_ajaran->status == 'active')
            <tr>
              <td>{{$str->id}}</td>
              <td>{{$str->profile->id}}</td>
              <td>Rp {{$str->jumlah_setoran}}</td>
              <td>{{$str->tanggal_setoran}}</td>
              <td>{{$str->tahun_ajaran->tahun}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table> 
    </div>
    <input type="radio" name="1" id="tab3">
    <div class="tab-content-box"> 
      @foreach($setoran as $str)
      <table class="table">
        <tr>
          <td><strong>Kode Setoran</strong></td>
          <td> : </td>
          <td>{{$str->id}}</td>
        </tr>
        <tr>
          <td><strong>Kode Tabungan</strong></td>
          <td> : </td>
          <td>{{$str->profile->id}}</td>
        </tr>
        <tr>
          <td><strong>Nama</strong></td>
          <td> : </td>
          <td>{{$str->profile->nama}}</td>
        </tr>
        <tr>
          <td><strong>Jumlah Setoran</strong></td>
          <td> : </td>
          <td>Rp {{$str->jumlah_setoran}}</td>
        </tr>
        <tr>
          <td><strong>Tanggal Setoran</strong></td>
          <td> : </td>
          <td>{{$str->tanggal_setoran}}</td>
        </tr>
        <tr>
          <td><strong>Tahun Ajaran</strong></td>
          <td> : </td>
          <td>{{$str->tahun_ajaran->tahun}}</td>
        </tr>
      </table>
      <a href="/setoran/{{$str->id}}/cetak_pdf" target="_blank">Download PDF</a>
      <hr>
      <hr>
      @endforeach
    </div>
  </div>
</div>

<div>
  <a href="/home" class="button1">Kembali</a>
</div>
     


@endsection

@section('js')

@endsection
