<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $formFields = $request->validate([
            'content' => 'required'
        ]);

        $formFields['user_id'] = Auth::id();

        $formFields['post_id'] = $post->id;

        Comment::create($formFields);

        return back()->with('message', 'Se ha publicado su comentario');
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', [
            'comment' => $comment
        ]);
    }

    public function update(Request $request, Comment $comment)
    {
        $formFields = $request->validate([
            'content' => 'required'
        ]);

        $comment->update($formFields);

        return back()->with('message', 'El comentario a sido moficiado de manera exitosa');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('message', 'Se ha eliminado el comentario');
    }
}
