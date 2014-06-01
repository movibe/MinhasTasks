@extends ('layout.layout')

@section('title', 'Cadastre-se')
@section('content')

@if ( count($errors) > 0)
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Errors!</strong> encontrados:
</div>

<ul>
	@foreach ($errors->all() as $e)
	<li>{{ $e }}</li>
	@endforeach
</ul>
@endif


<div class="row">
	<div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Cadastre uma ocnta</div>
			<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="{{ URL::to('login')}}">Já é cadastrado?</a></div>
		</div>  
		<div class="panel-body" >
			{{ Form::open(array('url'=> 'signup', 'method' => 'post' )) }}
			

			<div style="margin-bottom: 25px" class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				{{ Form::email('email', Input::old('email'), array('placeholder'=>'Email', 'class'=>'form-control' )) }}
			</div>

			<div style="margin-bottom: 25px" class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				{{ Form::text('nome', Input::old('nome'), array('placeholder'=>'Nome', 'class'=>'form-control' )) }}
			</div>

			<div style="margin-bottom: 25px" class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				{{ Form::text('password', Input::old('password'), array('placeholder'=>'Senha', 'class'=>'form-control' )) }}
			</div>


			<div class="form-group">
				<!-- Button -->                                        
				<div class="col-md-offset-3 col-md-9">
					
					{{ Form::submit('Cadastrar', ['class' => 'btn btn-success']) }}
				</div>
			</div>
			
			{{ Form::close() }}
		</div>
	</div>
</div>
</div> 

@endsection