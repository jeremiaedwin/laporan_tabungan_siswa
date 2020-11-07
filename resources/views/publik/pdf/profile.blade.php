<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
    <h3>Profille {{$profiles->name}}</h3>

    <div class="row mt-5">
    	<div class="col-md-6">
    		<div class="card">
		      <img class="card-img-top" src="{{public_path('image/'.$profiles->image)}}" alt="Card image cap">
		    </div>
    	</div>
    	<div class="col-md-6">
    		<table class="table">
		      <tbody>
		          <tr>
		            <td>Nama : </td>
		            <td>{{$profiles->nama}}</td>
		          <tr>
		            <td>NIS : </td>
		            <td>{{$profiles->id}}</td>
		          </tr>
		          <tr>
		            <td>NISN : </td>
		            <td>{{$profiles->nisn}}</td>
		          </tr>
		          <tr>
		            <td>Kelas : </td>
		            <td>{{$profiles->kelas->kelas}}</td>
		          </tr>
		          <tr>
		            <td>Jurusan : </td>
		            <td>{{$profiles->jurusan->jurusan}}</td>
		          </tr>
		        </tbody>
		    </table>
    	</div>
    </div>
    <div class="card mt-5">
		      <div class="card-head bg-primary text-white">
		        <center><h5 class="mt-2 align-center">Riwayat Setoran</h5></center>
		      </div>
		      <div class="card-body">
		          <table class="table table-hover">
		            <thead class="thead-primary">
		                <tr>
		                    <th scope="col">No</th>
		                    <th scope="col">ID</th>
		                    <th scope="col">Jumlah Setoran</th>
		                    <th scope="col">Tanggal Setoran</th>
		                    <th scope="col">Aksi</th>
		                </tr>
		            </thead>
		            <tbody>
		              <?php $no = 1; ?>
		              @foreach($setor as $str)
		                <tr>
		                  <th scope="row">{{$no++}}</th>
		                  <td>{{$str->id}}</td>
		                  <td>{{$str->jumlah_setoran}}</td>
		                  <td>{{$str->tanggal_setoran}}</td>
		                  <td>
		                    <a href="/admin-setor/{{$str->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
		                  </td>
		                </tr>
		                @endforeach
		                <tr class="bg-primary text-white">
		                  <td>Total</td>
		                  <td></td>
		                  <td></td>
		                  <td></td>
		                  <td>{{$setor->sum('jumlah_setoran')}}</td>
		                </tr>
		            </tbody>
		        </table>
		      </div>
		  </div>
		  <div class="card mt-5">
		      <div class="card-head bg-warning text-white">
		        <center><h5 class="mt-2 align-center">Riwayat Penarikan</h5></center>
		      </div>
		      <div class="card-body">
		          <table class="table table-hover">
		            <thead class="thead-primary">
		                <tr>
		                    <th scope="col">No</th>
		                    <th scope="col">ID</th>
		                    <th scope="col">Jumlah Penarikan</th>
		                    <th scope="col">Tanggal Penarikan</th>
		                    <th scope="col">Aksi</th>
		                </tr>
		            </thead>
		            <tbody>
		              <?php $no = 1; ?>
		              @foreach($tarik as $trk)
		                <tr>
		                  <th scope="row">{{$no++}}</th>
		                  <td>{{$trk->id}}</td>
		                  <td>{{$trk->jumlah_penarikan}}</td>
		                  <td>{{$trk->tanggal_penarikan}}</td>
		                  <td>
		                    <a href="/admin-tarik/{{$str->id}}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
		                  </td>
		                </tr>
		                @endforeach
		                <tr class="bg-warning text-white">
		                  <td>Total</td>
		                  <td></td>
		                  <td></td>
		                  <td></td>
		                  <td>{{$tarik->sum('jumlah_penarikan')}}</td>
		                </tr>
		            </tbody>
		        </table>
		      </div>
			</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>

