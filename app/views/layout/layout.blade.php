<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tarefas: @yield('title') </title>
	<meta charset="UTF-8">
	<meta name=description content="">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="{{ URL::to('images/favicon.ico') }}">
	<!-- Bootstrap CSS -->
	{{ HTML::style('assets/bootstrap/dist/css/bootstrap.min.css') }}
	{{ HTML::style('css/dashboard.css') }}
	
</head>
<body>
	
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<img src="{{ URL::to('images/icon.png') }}" alt="" height="50">{{ HTML::link('/', 'Minhas Tasks', ['class' => 'navbar-brand']) }} 
				
			</div>

			@if(Auth::check())
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<!-- <li>{{ HTML::link('listas', 'Tarefas') }}</li> -->
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Olá, {{ Auth::user()->nome }}  
						<img src="http://www.gravatar.com/avatar/{{  md5( strtolower( trim( "agfoccus@gmail.com " ) ) ) }}" alt="" height="25">
						 </a></li>
					<li>{{ HTML::link('logout', 'Sair') }}</li>
				</ul>
			</div>
			@endif
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			@if(Auth::check())
			@include('listas._sidebar')
			<div class="col-sm-12col-sm-offset-3 col-md-10 col-md-offset-2 main">
			@else 
			<div class=" main">
			@endif

			
				@yield ('content')

				@include('layout._footer')
			</div>
		</div>
	</div>


	<!-- jQuery -->
	{{ HTML::script('assets/jquery/jquery.min.js') }}

	{{ HTML::script('assets/bootstrap/js/collapse.js') }}
	{{ HTML::script('assets/bootstrap/js/carousel.js') }}
	{{ HTML::script('assets/bootstrap3-typeahead/bootstrap3-typeahead.min.js') }}

	<!-- Bootstrap JavaScript -->
	{{ HTML::script('assets/bootstrap/dist/js/bootstrap.min.js') }}

	@section('custom_script')
	@show
	
</body>
</html>