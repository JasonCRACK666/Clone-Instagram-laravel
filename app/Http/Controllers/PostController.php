<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['hashtag', 'search']))->get(),
            'users' => User::inRandomOrder()->limit(3)->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'hashtags' => 'required',
            'content' => ['required', 'min:10']
        ]);

        $formFields['image'] = $request->file('image')->store('postImages', 'public');

        $formFields['user_id'] = Auth::id();

        Post::create($formFields);

        return back()->with('message', 'Ha creado un Post');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $formFields = $request->validate([
            'hashtags' => 'required',
            'content' => ['required', 'min:10']
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('postImages', 'public');
        }

        $post->update($formFields);

        return back()->with('message', 'Se ha actualizado el post de manera correcta!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('message', 'El Post ha sido eliminado');
    }
}
