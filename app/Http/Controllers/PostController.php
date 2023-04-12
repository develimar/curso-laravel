<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    public function index()
    {
        //$posts = Post::orderBy('id','DESC')->paginate();
        $posts = Post::latest()->paginate();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {
        Post::create($request->all());
        return redirect()->route('posts.index')->with('message', 'Registro Criado com sucesso!');
    }

    public function show($id)
    {
        //$post = Post::where('id', $id)->first();
        ;
        if (!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id)
    {
        if (!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Post deletado com sucesso.');
    }

    public function edit($id)
    {
        if (!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id)
    {
        if (!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        $post->update($request->all());
        return redirect()->route('posts.index')->with('message', 'Registro Atualizado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = Arr::except($request->all(), '_token');
        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->paginate();
        return view('admin.posts.index', compact('posts','filters'));
    }
}
