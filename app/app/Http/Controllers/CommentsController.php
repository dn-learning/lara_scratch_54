<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        // adding validation:
        $this->validate(request(), [
            'body'=>'required|min:5'
        ]);

        // long method:
        // Comment::create([
        //     'body'      => request('body'),
        //     'post_id'   => $post->id
        // ]);

        // another way to add comments - via new method in model:
        $post->addComment(request('body'));

        return back();
    }
}
