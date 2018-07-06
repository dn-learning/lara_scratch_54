@extends ('layouts.master')
    @section ('content')
        <div class="col-md-8 blog-main">
            <h2 class="blog-post-title">  {{ $post->title }} </h2>

            <p class="blog-post-meta"> {{ $post->created_at->toFormattedDateString() }} <a href="#"> Damian </a></p>

            <hr>

            <p> {{ $post->body }} </p>
        </div>
    @endsection
