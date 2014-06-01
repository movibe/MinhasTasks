@extends ('layout.layout')

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

			<div style="margin-bottom: 25px" class="input-group form-group">
				<label for="email" class="col-md-3 control-label">Email</label>
				<div class="col-md-9">
					{{ Form::email('email', Input::old('email'), ['class' => 'form-control']) }}
				</div>
			</div>

			<div style="margin-bottom: 25px" class="input-group form-group">
				<label for="firstname" class="col-md-3 control-label">Nome</label>
				<div class="col-md-9">
					{{ Form::text('nome', Input::old('nome'), array('placeholder'=>'Digite seu nome', 'class'=>'form-control' )) }}
				</div>
			</div>
			
			<div style="margin-bottom: 25px" class="input-group form-group">
				<label for="password" class="col-md-3 control-label">Senha</label>
				<div class="col-md-9">
					{{ Form::password('password', ['class' => 'form-control']) }}
				</div>
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