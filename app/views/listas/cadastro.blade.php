@section('content')

<div class="page-header">
	<h1>Cadastro<small> de Lista de Tarefas</small></h1>
</div>

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

		{{ Form::open( array('url' => "listas/cadastro") ) }}
		<div class="form-group">
			{{ Form::label('titulo', 'Nova Lista de Tarefas:') }}
			{{ Form::text('titulo', '', ['class' => 'form-control']) }}
		</div>
		{{ HTML::link('listas', 'Cancelar', ['class' => 'btn btn-warning']) }}
		{{ Form::submit('Cadastrar',['class' => 'btn btn-success']) }}
		{{ Form::close() }}

	</div>
</div>

@endsection