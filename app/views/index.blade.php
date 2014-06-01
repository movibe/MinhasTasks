@extends ('layout.layout')
@section('content')

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li>{{ HTML::link('sobre', 'Sobre') }}</li>
          <li>{{ HTML::link('login', 'Login') }}</li>
        </ul>
        <h3 class="muted">Minhas Taks</h3>
      </div>

      <hr>

          
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
            <a class="btn btn-primary" href="http://blog.frenetic.com.br/category/projetos/todovel/">Leia o Tutorial</a>
            <a class="btn btn-info" href="https://github.com/frenetic/todovel">Veja o Código no GitHub</a>
        </p>
        
        
        <p>
            <a class="btn btn-small btn-danger" href="http://todovel.frenetic.com.br/cadastro">Cadastre-se</a>
            <a class="btn btn-small btn-inverse" href="http://todovel.frenetic.com.br/login">Login</a>
        </p>
    </div>
    
    
@endsection