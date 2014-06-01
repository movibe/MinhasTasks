<div class="col-sm-3 col-md-2 sidebar">
	<h3>Lista de Tarefas</h3>

	<p>
		{{ HTML::link('listas/cadastro', 'Adicionar Lista de Tarefas', ['class' => 'btn btn-success']) }}
	</p>
	<ul class="list-group">
		@foreach($listas as $lista)

		@if(count($lista->tarefas) == 0)
			<li class="list-group-item ">
			@else
		<li class="list-group-item list-group-item-danger">
				@endif
				@if($lista->status)
				<span class="label label-success"> {{ $lista->titulo }} </span>
				@else
				<label data-lista-id="{{ $lista->id }}">
					{{ HTML::link('listas/tarefas/' . $lista->id, $lista->titulo) }}
					<span class="badge">{{ count($lista->tarefas) }} </span>
				</label>
				@endif

			</li>
			@endforeach
		</ul>
	</div>