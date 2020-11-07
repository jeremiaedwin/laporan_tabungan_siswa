@if(auth()->user()->role == 'admin')
    <script type="text/javascript">
        window.location = "{{ url('/dashboard') }}";//here double curly bracket
    </script>
@endif 

@extends('publik.layouts.app')

@section('content')

@if(auth()->user()->Profile)
<div class="container">
  <div class="row mt-4">
      <div class="col-md-4">
        <div class="user">
          <div class="layer-user-2">
            <img src="{{asset('image/'. Auth::user()->Profile->image)}}" class="user-img">
          </div>
          <div class="user-name">{{Auth::user()->Profile->nama}}</div>
          <div class="layer-card"></div>
        </div>
      </div>
      <div class="col-md-8" align="center">
        <div align="left">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Profile Anda</h3>
                    <table class="table">
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td>{{Auth::user()->Profile->nis}}</td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td>{{Auth::user()->Profile->nisn}}</td>
                        </tr>
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                            <td>{{Auth::user()->Profile->nama}}</td>
                        </tr>
                        <tr>
                            <td>KELAS</td>
                            <td>:</td>
                            <td>{{Auth::user()->Profile->kelas->kelas}}</td>
                        </tr>
                        <tr>
                            <td>JURUSAN</td>
                            <td>:</td>
                            <td>{{Auth::user()->Profile->jurusan->jurusan}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Setoran</div>
                    <div class="card-body">
                        <h5 class="card-title">RP {{Auth::user()->setor_tabungan->sum('jumlah_setoran')}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Penarikan</div>
                    <div class="card-body">
                        <h5 class="card-title">RP {{Auth::user()->tarik_tabungan->sum('jumlah_penarikan')}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
               <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Saldo</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp {{Auth::user()->setor_tabungan->sum('jumlah_setoran') - Auth::user()->tarik_tabungan->sum('jumlah_penarikan')}}</h5>
                    </div>
                </div> 
            </div>
        </div>
          
            
            
      </div>
    </div>
    <div class="row mt-3" style="background-color: #a69797">
  <div class="col-md-6">
    <div><center><h4><b>Setoran</b></h4></center></div>
    <table class="table table-bordered">
      <thead class="bg-dark" style="color: white">
        <tr>
          <td>NO</td>
          <td>ID</td>
          <td>Tanggal Setoran</td>
          <td>Jumlah Setoran</td>
        </tr>
      </thead>
      <tbody>
        @php $no = 1 @endphp
        @foreach($setoran as $str)
        @if($str->tahun_ajaran->status == 'active')
          <tr>
            <td>{{$no++}}</td>
            <td>{{$str->id}}</td>
            <td>Rp {{$str->jumlah_setoran}}</td>
            <td>{{$str->tanggal_setoran}}</td>
          </tr>
          @endif
        @endforeach
        <tr class="bg-dark" style="color: white">
          <td>Total</td>
          <td></td>
          <td></td>
          <td >{{$setoran->sum('jumlah_setoran')}}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-md-6">
    <div><center><h4><b>Penarikan</b></h4></center></div>
    <table class="table table-bordered">
      <thead class="bg-dark" style="color: white">
        <tr>
          <td>NO</td>
          <td>ID</td>
          <td>Tanggal Penarikan</td>
          <td>Jumlah Penarikan</td>
        </tr>
      </thead>
      <tbody>
        @php $no = 1 @endphp
        @foreach($penarikan as $trk)
        @if($trk->tahun_ajaran->status == 'active')
          <tr>
            <td>{{$no++}}</td>
            <td>{{$trk->id}}</td>
            <td>Rp {{$trk->jumlah_penarikan}}</td>
            <td>{{$trk->tanggal_penarikan}}</td>
          </tr>
          @endif
        @endforeach
        <tr class="bg-dark" style="color: white">
          <td>Total</td>
          <td></td>
          <td></td>
          <td >{{$penarikan->sum('jumlah_penarikan')}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>  

<div class="row mt-3" style="background-color: #f4ecec">
  <div class="col-md-6" id="chart-container">
    asd
  </div>
  <div class="col-md-6" id="chart-container">
    <table class="table table-bordered">
      <div class="bg-dark" style="color: white"><center><h5>Kesimpulan</h5></center></div>
      <tr>
        <td>Total Penarikan </td>
        <td>:</td>
        <td>RP {{Auth::user()->setor_tabungan->sum('jumlah_setoran')}}</td>
      </tr>
      <tr>
        <td>Total Penarikan </td>
        <td>:</td>
        <td>RP {{Auth::user()->tarik_tabungan->sum('jumlah_penarikan')}}</td>
      </tr>
      <tr>
        <td>Total Saldo </td>
        <td>:</td>
        <td>Rp {{Auth::user()->setor_tabungan->sum('jumlah_setoran') - Auth::user()->tarik_tabungan->sum('jumlah_penarikan')}}</td>
      </tr>
    </table>
</div>


@else
<center>Oops sepertinya Kamu belum terdaftar, segera hubungi admin!!</center>
@endif


@endsection
    
@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
Highcharts.chart('chart-container', {

    title: {
        text: 'TABUNGAN ANDA'
    },


    yAxis: {
        title: {
            text: 'Rupiah'
        }
    },

    xAxis: {
       
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    series: [{
        name: 'Setoran',
        data: ({!!json_encode($setoran2)!!})
    }, {
        name: 'Tarikan',
        data: ({!!json_encode($penarikan2)!!})
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>
@endsection
