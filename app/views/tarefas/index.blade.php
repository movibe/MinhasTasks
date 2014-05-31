@section('content')

<ul>
	@foreach($tarefas as $tarefa)

	<li style="list-style: none">
		@if($tarefa->status)
		<span class="label label-success"> {{ $tarefa->titulo }} </span>
		@else
		<label data-tarefa-id="{{ $tarefa->id }}">
			<input type="checkbox"> {{ $tarefa->titulo }}
		</label>
		@endif

	</li>

	@endforeach
</ul>

@endsection

@section('custom_script')

    <script>
    $(document).ready(function() {
    	$('li label input').on('change', function() {
    		var tarefa_id = $(this).parent().data('tarefa-id');
    		var li = $(this).parent().parent();

    		$.post('check', 
    		       {tarefa_id: tarefa_id}, 
    		       function(json, textStatus, xhr) {
    				if (json.status == true) {
    					li.html('<span class="label label-success">' + json.titulo + '</span>');
    				};
    		});
    	});
    });
    </script>
    
@endsection