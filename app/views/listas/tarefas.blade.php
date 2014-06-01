@section('content')

<div class="page-header">
  <h1>Lista<small> de {{ $lista->titulo }}</small></h1>
</div>

<p>
    {{ HTML::link('listas/', 'Voltar', [ 'class' => 'btn btn-info']) }}
    {{ HTML::link('tarefas/cadastro/'.$lista->id, 'Adicionar Tarefa', [ 'class' => 'btn btn-warning']) }}
    {{ HTML::link('listas/', 'Excluir Lista', [ 'class' => 'btn btn-danger']) }}
</p>

<ul>
    @foreach($lista->tarefas as $tarefa)
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

        $.post('/tarefas/check', 
               {tarefa_id: tarefa_id}, 
               function(json, textStatus, xhr) {
                if (json.status == true) {
                    li.html('<span class="label label-success">' + json.titulo + '</span>');
                };
            });
    });
});
</script>
@stop