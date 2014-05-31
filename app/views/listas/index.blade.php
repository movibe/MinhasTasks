@section('content')

<h1 class="text-center">Listas de Tarefas</h1>

<table class="table table-hover">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Opções</th>
		</tr>
	</thead>
	<tbody>
		@foreach($listas as $lista)

		<tr>
			<td>{{ $lista->titulo }} </td>
			<td>{{ HTML::link('listas/delete/' . $lista->id, 'Excluir', ['class' => 'btn btn-danger']) }}</td>
		</tr>

		@endforeach
	</tbody>
</table>



@endsection