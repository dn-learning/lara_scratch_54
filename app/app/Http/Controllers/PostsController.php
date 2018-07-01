<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts/index');
    }

    public function show()
    {
        return view('posts/show');
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        // dd(request()->all());
        // other ways to get data from request:
        // dd(request(['title','body'])); // array if multi fields otherwise string

        // 1st way to deal with request:
        // $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->save();

        // 2nd way: it combines creating and saving, however you have to deal with mass assignment
        // it can be done trough $fillable / $guarded in model or by making your own model with global $fill/$guard
        //
        // Post::create([
        //     'title'=>request('title'),
        //     'body'=>request('body')
        // ]);

        // or

        Post::create(request(['title','body'])); // prefered by laracasts


        return redirect('/');
    }
}
