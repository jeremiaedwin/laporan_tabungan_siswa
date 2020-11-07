@extends('publik.layouts.app')

@section('content')

<div class="mt-3">
  <div class="tab-trigger">
    <ul>
      <li><label for="tab1">Riwayat Penarikan</label></li>
      <li><label for="tab2">penarikan Tahun Ini</label></li>
      <li><label for="tab3">Detail penarikan</label></li>
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
                <th scope="col">Jumlah Penarikan</th>
                <th scope="col">Tanggal Penarikan</th>
                <th scope="col">Tahun</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penarikan as $trk)
            <tr>
              <td>{{$trk->id}}</td>
              <td>{{$trk->profile->id}}</td>
              <td>Rp {{$trk->jumlah_penarikan}}</td>
              <td>{{$trk->tanggal_penarikan}}</td>
              <td>{{$trk->tahun_ajaran->tahun}}</td>
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
                <th scope="col">Jumlah Penarikan</th>
                <th scope="col">Tanggal Penarikan</th>
                <th scope="col">Tahun</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penarikan2 as $trk)
            @if($trk->tahun_ajaran->status == 'active')
            <tr>
              <td>{{$trk->id}}</td>
              <td>{{$trk->profile->id}}</td>
              <td>Rp {{$trk->jumlah_penarikan}}</td>
              <td>{{$trk->tanggal_penarikan}}</td>
              <td>{{$trk->tahun_ajaran->tahun}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table> 
    </div>
    <input type="radio" name="1" id="tab3">
    <div class="tab-content-box"> 
      @foreach($penarikan as $trk)
      <table class="table table-bordered">
        <tr>
          <td><trkong>Kode Penarikan</trkong></td>
          <td> : </td>
          <td>{{$trk->id}}</td>
        </tr>
        <tr>
          <td><trkong>Kode Tabungan</trkong></td>
          <td> : </td>
          <td>{{$trk->profile->id}}</td>
        </tr>
        <tr>
          <td><trkong>Nama</trkong></td>
          <td> : </td>
          <td>{{$trk->profile->nama}}</td>
        </tr>
        <tr>
          <td><trkong>Jumlah Penarikan</trkong></td>
          <td> : </td>
          <td>Rp {{$trk->jumlah_penarikan}}</td>
        </tr>
        <tr>
          <td><trkong>Tanggal Penarikan</trkong></td>
          <td> : </td>
          <td>{{$trk->tanggal_penarikan}}</td>
        </tr>
        <tr>
          <td><trkong>Tahun Ajaran</trkong></td>
          <td> : </td>
          <td>{{$trk->tahun_ajaran->tahun}}</td>
        </tr>
        
      </table>
      <a href="/setoran/{{$trk->id}}/cetak_pdf" target="_blank">Download PDF</a>
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
