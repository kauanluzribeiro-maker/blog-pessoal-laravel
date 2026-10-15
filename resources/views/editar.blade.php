<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar postagem</title>
  <link rel="stylesheet" href="{{asset('pagina1.css')}}">
</head>
<body>
    <h1> Editar Postagem </h1>
 
    <div style="border: 3px solid rgb(18, 19, 19)">
        <form action="{{ route('posts.update', $post->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="titulo" placeholder="Titulo" value="{{ old('titulo', $post->titulo) }}">
            <textarea name="postagem" placeholder="Escreva sua postagem">{{ old('postagem', $post->postagem) }}</textarea>
            <button> Salvar </button>
        </form>
    </div>
 
    <a href="/">Voltar</a>
</body>
</html>