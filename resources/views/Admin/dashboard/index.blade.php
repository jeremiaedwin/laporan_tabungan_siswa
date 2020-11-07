@extends('admin.layout.app')
@section('title', 'dashboard')
@section('content')

<h2>Dashboard</h2>

<!-- card -->
<div class="row mt-3">
	<div class="col-3">
		<div class="card text-dark bg-white mb-3" style="max-width: 18rem;">
			<div class="card-header bg-primary text-white">Total Siswa </div>
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col-md-9">
	                      	<div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalSiswa->count()}} Orang Siswa</div>
						</div>
						<div class="col-md-3">
							<i class="fas fa-users  fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3">
		<div class="card text-dark bg-white mb-3" style="max-width: 18rem;">
			<div class="card-header bg-secondary text-white">Total Tabungan </div>
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col-md-9">
	                      	<div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ $totalSetoran->sum('jumlah_setoran') - $totalTarikan->sum('jumlah_penarikan') }}</div>
						</div>
						<div class="col-md-3">
							<i class="fas fa-money-bill-wave-alt  fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3">
		<div class="card text-dark bg-white mb-3" style="max-width: 18rem;">
			<div class="card-header bg-warning text-white">Total Setoran </div>
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col-md-9">
	                      	<div class="h5 mb-0 font-weight-bold text-gray-800">Rp Rp {{$totalSetoran->sum('jumlah_setoran')}}</div>
						</div>
						<div class="col-md-3">
							<i class="fas fa-plus  fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3">
		<div class="card text-dark bg-white mb-3" style="max-width: 18rem;">
			<div class="card-header bg-danger text-white">Total Penarikan </div>
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col-md-9">
	                      	<div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{$totalTarikan->sum('jumlah_penarikan')}}</div>
						</div>
						<div class="col-md-3">
							<i class="fas fa-minus  fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of card -->

	<!-- chart -->
	<div class="row">
		<div class="col-md-6">
			<div id="chart-container">
			asd
		</div>
	</div>
	<div class="col-md-6">
		<div id="chart-container-2">
			asd
		</div>
	</div>
		
		
	</div>

	<!-- table -->
	<!-- <div class="col-md-6">
			<table class="table">
				<thead>
					<tr>
						<th>Jurusan</th>
						<th>XII</th>
						<th>Total Siswa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($jurusan as $jrs)
					<tr>
						<td>{{ $jrs->jurusan }}</td>
						<td>{{ $jurusan1->where("jurusan_id", $jrs->id)->count() }}</td>
					</tr>
					@endforeach
				</tbody>
				<td>
			</table>
		</div> -->
@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
Highcharts.chart('chart-container', {

    title: {
        text: 'Diagram Garis Tabungan Siswa'
    },


    yAxis: {
        title: {
            text: 'Rupiah'
        }
    },

    xAxis: {
        accessibility: {
            rangeDescription: 'Range: 2010 to 2017'
        }
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    series: [{
        name: 'Setoran',
        data: ({!!json_encode($setoran)!!})
    }, {
        name: 'Tarikan',
        data: ({!!json_encode($tarikan)!!})
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

<script type="text/javascript">
	
	Highcharts.chart('chart-container-2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah User Terdaftar'
    },
    xAxis: {
        categories: ({!!json_encode($jurusanAll)!!}),
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f} Siswa</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Siswa',
        data: ({!!json_encode($jurusanEuy)!!})

    }]
});
</script>
@endsection

