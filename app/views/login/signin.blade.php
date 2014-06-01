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
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"> 
	<div class="panel panel-info" >
		<div class="panel-heading">
			<div class="panel-title">Logar</div>
			<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Esqueceu sua senha?</a></div>
		</div>     

		<div style="padding-top:30px" class="panel-body" >

			<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

			
			{{ Form::open(array('url'=> 'login', 'method' => 'post' )) }}


			<div style="margin-bottom: 25px" class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				{{ Form::email('email', Input::old('email'), array('placeholder'=>'teste@teste.com', 'class'=>'form-control' )) }}
			</div>

			<div style="margin-bottom: 25px" class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				{{ Form::text('password', Input::old('password'), array('placeholder'=>'teste', 'class'=>'form-control' )) }}
			</div>



			<div class="input-group">
				<div class="checkbox">
					<label>
						{{ Form::checkbox('remember', Input::old('remember')) }} Lembrar
					</label>
				</div>
			</div>


			<div style="margin-top:10px" class="form-group">
				<!-- Button -->

				<div class="col-sm-12 controls">
					{{ Form::submit('Login', ['class' => 'btn btn-success']) }}

					<!-- <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a> -->

				</div>
			</div>


			<div class="form-group">
				<div class="col-md-12 control">
					<div style=" padding-top:15px; font-size:85%" >
						Você ainda não tem uma conta? 
						<a href="{{ URL::to('signup') }}" >
							Cadastre-se
						</a>
					</div>
				</div>
			</div>    
			
			{{ Form::close() }}     



		</div>                     
	</div>  
</div>
</div> 



@endsection