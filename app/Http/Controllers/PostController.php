<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\directoryExists;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index( User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(8);

        return view('dashboard', ['user' => $user, 'posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:100',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

/*         Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id,
        ]); */

        //otra forma de crear reguistros

/*         $post = new Post;
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id; */

        //Ota forma de crear registro

        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Post $post, Comentario $comentario)
    {
        return view('posts.show', ['user' => $user, 'post' => $post, 'comentario' => $comentario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        //eliminar imagen de la carpeta

        $imagen_path = public_path('uploads/' . $post->imagen);

        if(File::exists($imagen_path)){
            unlink($imagen_path);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
