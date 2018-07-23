<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        // $posts = Post::all();                                    // the simplest case
        // $posts = Post::orderBy('created_at', 'desc')->get();
        // $posts = Post::latest()->get();                          // used prior to refactor below


        // getting selected posts before refactor!
        // if (request('period')) {
        //     $periodStart = Carbon::Parse(request('period'))->format('Y-m');
        //     $periodEnd = Carbon::Parse(request('period'))->addMonth()->format('Y-m');
        //
        //     $posts = $posts->where('created_at', '>=', $periodStart."-01")
        //                     ->where('created_at', '<', $periodEnd."-01");
        // }

        // refactored way via query scope
        $posts = Post::latest()
            ->filter(request('period'))                             // getting selected posts via scope
            ->get();

        // temporary way - to replace with view composer!!
        // $archives = Post::latest()
        //     ->get(['id','created_at'])
        //     ->groupBy(function ($date) {
        //         return Carbon::Parse($date->created_at)->format('F Y');
        //     });

        // better way:
        $archives = Post::archives();

        return view('posts/index', compact(['posts']));             // ,'archives' removed owing to refactor
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

    // public function test()
    // {
    // tested in tinker grouping by year - month
    // $test2 = Post::latest()->get(['id','created_at'])->groupBy(function ($date) {
    //     return \Carbon\Carbon::Parse($date->created_at)->format('F Y');
    // });

    // counting post in each month
    // foreach ($test2 as $period) {
    //     echo count($period)."\n";
    // }
    // }

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
        //Post::create(request(['title','body'])); // prefered by laracasts

        // new post with user added as in ep.19
        // Post::create([
        //     'title'=>request('title'),
        //     'body'=>request('body'),
        //     'user'=>auth()->id()
        // ]);

        // and yet another way to do it:
        auth()->user()->publish(new Post(request(['title','body'])));

        return redirect('/');
    }
}
