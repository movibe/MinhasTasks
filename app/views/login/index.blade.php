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
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				{{ Form::email('email', Input::old('email'), array('placeholder'=>'agfoccus@gmail.com', 'class'=>'form-control' )) }}
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
					<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
						Você ainda não tem uma conta? 
						<a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
							Cadastre-se
						</a>
					</div>
				</div>
			</div>    
			
			{{ Form::close() }}     



		</div>                     
	</div>  
</div>
<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Sign Up</div>
			<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
		</div>  
		<div class="panel-body" >
			<form id="signupform" class="form-horizontal" role="form">

				<div id="signupalert" style="display:none" class="alert alert-danger">
					<p>Error:</p>
					<span></span>
				</div>



				<div class="form-group">
					<label for="email" class="col-md-3 control-label">Email</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="email" placeholder="Email Address">
					</div>
				</div>

				<div class="form-group">
					<label for="firstname" class="col-md-3 control-label">First Name</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="firstname" placeholder="First Name">
					</div>
				</div>
				<div class="form-group">
					<label for="lastname" class="col-md-3 control-label">Last Name</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="lastname" placeholder="Last Name">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-md-3 control-label">Password</label>
					<div class="col-md-9">
						<input type="password" class="form-control" name="passwd" placeholder="Password">
					</div>
				</div>

				<div class="form-group">
					<label for="icode" class="col-md-3 control-label">Invitation Code</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="icode" placeholder="">
					</div>
				</div>

				<div class="form-group">
					<!-- Button -->                                        
					<div class="col-md-offset-3 col-md-9">
						<button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
						<span style="margin-left:8px;">or</span>  
					</div>
				</div>

				<div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">

					<div class="col-md-offset-3 col-md-9">
						<button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
					</div>                                           

				</div>



			</form>
		</div>
	</div>




</div> 

@endsection