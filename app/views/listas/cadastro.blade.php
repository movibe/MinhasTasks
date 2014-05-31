@section('content')

<div class="row-fluid marketing">
	<div class="span6">
		@if ( count($errors) > 0)
		Erros encontrados:<br />
		<ul>
			@foreach ($errors->all() as $e)
			<li>{{ $e }}</li>
			@endforeach
		</ul>
		@endif

		@if ( isset($sucesso) )
		<h3>FUNCIONOU!</h3>
		@endif

		{{ Form::open( array('url' => "listas/cadastro") ) }}
		<div class="form-group">
			{{ Form::label('titulo', 'Nova Lista de Tarefas:') }}
			{{ Form::text('titulo', '', ['class' => 'form-control']) }}
		</div>

		{{ Form::submit('OK',['class' => 'btn btn-success']) }}
		{{ Form::close() }}

	</div>
</div>

@endsection