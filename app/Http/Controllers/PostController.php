<?php
 
namespace App\Http\Controllers;
 
use App\Models\Post;
use Illuminate\Http\Request;
 
class PostController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $posts = Post::with('user')
                ->where('user_id', auth()->id())
                ->latest()
                ->get();
        } else {
            $posts = collect();
        }

        return view('pagina1', compact('posts'));
    }
 
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {
        $campos = $request->validate([
        'titulo' => ['required', 'string', 'min:3', 'max:100'],
        'postagem' => ['required', 'string', 'min:5'],
        ]);

        $campos['user_id'] = auth()->id();
        Post::create($campos);

        return redirect('/')->with ('success', 'Post publicado com sucesso!');
    }
 
    public function show(Post $post)
    {
        //
    }
 
    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }
 
        return view('editar', compact('post'));
    }
 
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }
 
        $campos = $request->validate([
        'titulo' => ['required', 'string', 'min:3', 'max:100'],
        'postagem' => ['required', 'string', 'min:5'],
        ]);
 
        $post->update($campos);

        return redirect('/')->with('success', 'Post atualizado com sucesso!');
    }
 
    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }
 
        $post->delete();

        return redirect('/')->with('success', 'Post excluído com sucesso!');
    }
}