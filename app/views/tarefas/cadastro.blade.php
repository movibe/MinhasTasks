@section('title', 'Nova Tarefa')

@section('content')

<div class="page-header">
	<h1>Nova Tarefa<small> : {{ $lista->titulo }}</small></h1>
</div>

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
		{{ Form::open(array('url'=> 'tarefas/cadastro/'. $lista_id, 'method' => 'post' )) }}
		<div class="form-group">
			{{ Form::label('titulo', "Tarefa a ser Cumprida") }}
			{{ Form::text('titulo', '', array('placeholder'=>'Nome da Tarefa', 'class'=>'form-control' )) }}
		</div>
		<div class="form-group">
			{{ HTML::link('listas', 'Cancelar', ['class' => 'btn btn-warning']) }}
			{{ Form::submit('Cadastrar', ['class' => 'btn btn-success']) }}
		</div>
		{{ Form::close() }}
	</div>
</div>

@endsection