<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tarefas: @yield('title') </title>
	<meta charset="UTF-8">
	<meta name=description content="">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	{{ HTML::style('assets/bootstrap/dist/css/bootstrap.min.css') }}
	
</head>
<body>
	
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
		{{ HTML::link('/', 'Minha Task', ['class' => 'navbar-brand']) }}

		<ul class="nav navbar-nav">
			<li class="">
				@if(Auth::check())
				{{ HTML::link('listas', 'Tarefas') }}
				@endif
			</li>
		</ul>


		@if(Auth::check())
		<ul class="nav navbar-nav navbar-right">

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="http://www.gravatar.com/avatar/{{  md5( strtolower( trim( "agfoccus@gmail.com " ) ) ) }}" alt="" height="20">  Olá, {{ Auth::user()->nome }} <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>{{ HTML::link('settings', 'Configurações') }}</li>
					<li class="divider"></li>
					<li>{{ HTML::link('logout', 'Sair') }}</li>
				</ul>
			</li>
		</ul>
		@endif

	</nav>


	<div class="container">

		@yield ('content')

		<hr>
		<div class="footer">
			<p>Criado por <a href="https://github.com/movibe" target="_blank">Willian Ribeiro Angelo</a></p>
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