@extends ('layout.layout')
@section('title', 'Bem vindo')
@section('content')
          
    <div class="jumbotron">
        <h1>Minhas Tasks</h1>
        
        <p class="lead">
            Minhas Tasks é um simples sistema de listas de coisas para fazer (to-do list). 
            <br>
            Desenvolvido com o framework PHP <a href="http://laravel.com/" target="_blank">Laravel 4</a>.
            <br>
            Este aplicativo foi criado para ser um <a href="http://blog.frenetic.com.br/category/projetos/todovel/" target="_blank">tutorial básico de como utilizar o Laravel 4</a>.
        </p>
        
        <p>
            <a class="btn btn-primary" href="http://blog.frenetic.com.br/category/projetos/todovel/" target="_blank">Baseado no Tutorial</a>
            <a class="btn btn-info" href="https://github.com/movibe/MinhasTasks" target="_blank">Veja o Código no GitHub</a>
        </p>
        
        <p>
            Acesse:
        </p>
        <p>
            {{ HTML::link('signup', 'Cadastre-se', ['class' => 'btn btn-success'] ) }}
            {{ HTML::link('login', 'Login', ['class' => 'btn btn-warning'] ) }}
        </p>
    </div>
    
    
@endsection