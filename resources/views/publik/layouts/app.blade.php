<!DOCTYPE html>
<html>
<head>
	<title>Tabungan Siswa</title>
	<!-- css -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('css/user.css')}}">
	<link href="{{url('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('css/main.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('css/util.css')}}" rel="stylesheet" type="text/css">
	<!-- end of css -->

</head>
<body>
	<div class="container-fluid">
		<!-- menu -->
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
		                <a class="navbar-brand" href="{{ url('home') }}">
		                    <i class="fas fa-users"></i>
		                </a>
		                @guest
		                @if (Route::has('register'))
		                @endif
		                 @else
						<a href="/setoran" class="navbar-brand">Setoran</a>
		                <a href="/penarikan" class="navbar-brand">Penarikan</a>
		                <a href="/rekap" class="navbar-brand">Rekap</a>
		                <a href="/profile/{{ Auth::user()->id }}" class="navbar-brand">Setting</a>
		                 @endguest
		                
		                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
		                    <span class="navbar-toggler-icon"></span>
		                </button>

		                <div class="collapse navbar-collapse" id="navbarSupportedContent">
		                    <!-- Left Side Of Navbar -->
		                    <ul class="navbar-nav mr-auto">

		                    </ul>

		                    <!-- Right Side Of Navbar -->
		                    <ul class="navbar-nav">
		                        <!-- Authentication Links -->
		                        @guest
		                            <li class="nav-item">
		                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
		                            </li>
		                            @if (Route::has('register'))
		                                <!-- <li class="nav-item">
		                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
		                                </li> -->
		                            @endif
		                        @else
		                            <li class="nav-item dropdown">
		                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
		                                    {{ Auth::user()->name }}
		                                </a>

		                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" data-toggle="dropdown">
		                                    <a class="dropdown-item" href="{{ route('logout') }}"
		                                       onclick="event.preventDefault();
		                                                     document.getElementById('logout-form').submit();">
		                                        {{ __('Logout') }}
		                                    </a>

		                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
		                                        @csrf
		                                    </form>
		                                </div>
		                            </li>
		                        @endguest
		                    </ul>
		                </div>
		        </nav>
			</div>
		</div>
		<!-- end of menu -->

		<!-- content -->
		<div style="height: auto; width: 100%">
			<div class="container" style="height:1360px">
			@yield('content')
			@yield('js')
			</div>
			
		</div>
		
		
		
		<!-- end content -->

		<!-- footer -->
		
		<!-- end of footer -->
	</div>
	<div class="col-md-12 bg-dark mt-5">
				asd
		</div>
	<!-- js code -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<script type="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	@yield('js')
	<!-- end of js -->
</body>
</html>