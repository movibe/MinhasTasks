
@section('content')
	
	<div class="row-fluid marketing">
		@if(count($errors)>0)
		    <div class="alert">
		    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    	<strong>Erros</strong> Erros Encontrados
		    </div>

		    <ul>
		    	@foreach($errors->all() as $erro)
		        <li>{{ $erro }}</li>
		    	@endforeach
		    </ul>
		@endif

		<div class="span6">
			{{ Form::open(array('url'=> 'cadastro', 'method' => 'post' )) }}
				<div class="form-group">
					{{ Form::label('titulo', "Tarefa a ser Cumprida") }}
					{{ Form::text('titulo', '', array('placeholder'=>'Nome da Tarefa', 'class'=>'form-control' )) }}
				</div>
				<div class="form-group">
					{{ Form::submit('Enviar', ['class' => 'btn btn-success']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
    
@endsection