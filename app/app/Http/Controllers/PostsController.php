<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        // $posts = Post::all(); // the simplest case
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::latest()->get(); //
        return view('posts/index', compact('posts'));
    }

    // one way to do it!!!

    // public function show($id)
    // {
    //     $post = Post::find($id);
    //     return view('posts/show', compact('post'));
    // }

    public function show(Post $post)
    {
        return view('posts/show', compact('post'));
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        // adding validation:
        $this->validate(request(), [
            'title' => 'required',
            'body'=>'required'
        ]);

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
