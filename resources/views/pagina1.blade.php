<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Blog Pessoal</title>
  <link rel="stylesheet" href="{{asset('pagina1.css')}}">
</head>
<body>
    @if(session('success'))
        <div style="background:#d4edda;
        color:#155724;
        padding:10px;
        margin-bottom:15px;
        border-radius:5px;">
        {{session('success')}} </div>
    @endif

    <h1> Blog Pessoal</h1>

    @auth
    <p> Bem-vindo(a) ao seu espaço de publicações! </p>
    <p> Olá, <strong>{{auth()->user()->name}}</strong> </p>
    <p> Você possui <strong>{{auth()->user()->posts()->count()}} postagens. </strong> </p>

    <form action="/logout" method="POST">
        @csrf
        <button> Sair </button>
    
    </form>
    <div style="border: 3px solid rgb(18, 19, 19)">
            <h1> Meu Blog </h1>
            <form action="/posts" method="post">
                @csrf
                <input type="text" placeholder="Titulo" name="titulo">
                <textarea name="postagem" placeholder="Escreva sua postagem"></textarea>
                <button> Publicar </button>
            </form>
            <br>
        
    </div>

    <div style="border: 3px solid rgb(18, 19, 19)">
                <h1> Todas as Postagens </h1>
                @foreach ($posts as $post)
                <div style="
                    border:1px solid #ccc;
                    padding:10px;
                    margin-bottom:10px;"> 
                    <h3>{{$post->titulo}}</h3>
                    <p>{{$post->postagem}}</p> 
                    <small>Pubilcado em:{{$post->created_at->format('d/m/Y H:i')}}</small>
                   <small>Autor:{{$post->user->name}}</small>
 
                   @if(auth()->id() === $post->user_id)
                   <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
                   <form action="{{ route('posts.destroy', $post->id) }}" method="post" onsubmit="return confirm('Excluir esta postagem?');">
                       @csrf
                       @method('DELETE')
                       <button type="submit">Excluir</button>
                   </form>
                   @endif
                   </div>
                    @endforeach      
                </div>
    



    @else

    @if(request()->query('login') === '1')

    <div style="border: 3px solid black">
            <h1> Login </h1>

            @if($errors->any())
            <div style="background:#f8d7da;
            color:#721c24;
            padding:10px;
            margin-bottom:15px;
            border-radius:5px;">
            {{$errors->first()}}</div>
            @endif

            <form action="/login" method="post">
                @csrf
                <input type="email" placeholder="E-mail" name="email" value="{{old('email')}}">
                <input type="password" placeholder="*********" name="password">
                <button> Entrar </button>
            </form>

            <p>
                Ainda não possui uma conta?
                <a href="/">Cadastrar</a>
            </p>

            <br>
        
    </div>

    @else

    <div style="border: 3px solid black">
            <h1> Registro </h1>
            <form action="/registrar" method="post">
                @csrf
                <input type="text" placeholder="Nome" name="name">
                <input type="email" placeholder="E-mail" name="email">
                <input type="password" placeholder="*********" name="password">
                <button> Cadastrar </button>
            </form>

            <p>
                Já possui uma conta?
                <a href="/?login=1">Entrar</a>
            </p>

            <br>
        
    </div>

    @endif

    @endauth
    
<section class="contatos-redes">
    <h3> Contatos: </h3>

    <div class="redes-links">

        <a href="https://www.linkedin.com/in/kauan-luz-ribeiro-56279436b/"
           class="rede-link"
           target="_blank"
           rel="noopener noreferrer">

            <span class="rede-icone linkedin">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.94v5.666H9.35V9h3.414v1.561h.049c.476-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286ZM5.337 7.433a2.062 2.062 0 1 1 0-4.124 2.062 2.062 0 0 1 0 4.124ZM7.119 20.452H3.555V9h3.564v11.452ZM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003Z"/>
                </svg>
            </span>

            <span class="rede-info">
                <strong>LinkedIn</strong>
                <small>Kauan Luz Ribeiro</small>
            </span>

            <span class="rede-seta">↗</span>
        </a>

        <a href="https://github.com/SEU-USUARIO"
           class="rede-link"
           target="_blank"
           rel="noopener noreferrer">

            <span class="rede-icone github">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M12 .297a12 12 0 0 0-3.793 23.386c.6.111.82-.261.82-.577v-2.234c-3.338.726-4.043-1.416-4.043-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.09-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.108-.775.418-1.305.762-1.605-2.665-.304-5.467-1.332-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.536-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.527 11.527 0 0 1 12 5.875c1.02.005 2.045.138 3.003.404 2.291-1.552 3.297-1.23 3.297-1.23.655 1.652.243 2.873.12 3.176.77.84 1.235 1.91 1.235 3.221 0 4.61-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.216.694.825.576A12.001 12.001 0 0 0 12 .297"/>
                </svg>
            </span>

            <span class="rede-info">
                <strong>GitHub</strong>
                <small>Meus projetos e códigos</small>
            </span>

            <span class="rede-seta">↗</span>
        </a>

    </div>
</section>

  
</body>
</html>