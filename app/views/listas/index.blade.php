@section('content')
@section('title', 'Listas de Tarefas')

<div class="page-header">
	<h1>Lista<small> de Tarefas</small></h1>
</div>

<p>
	{{ HTML::link('listas/cadastro', 'Adicionar Lista de Tarefas', ['class' => 'btn btn-success']) }}
</p>

@if ( isset($sucesso) )
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Sucesso!</strong> Lista Cadastrada
</div>
@endif

<ul>
	@foreach($listas as $lista)
	<li style="list-style: none">
		@if($lista->status)
		<span class="label label-success"> {{ $lista->titulo }} </span>
		@else
		<label data-lista-id="{{ $lista->id }}">
			{{ HTML::link('listas/tarefas/' . $lista->id, $lista->titulo . " (" . count($lista->tarefas) . "   tarefas)" ) }}
		</label>
		@endif

	</li>

	@endforeach
</ul>

@endsection