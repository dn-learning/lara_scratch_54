@extends ('layouts.master')
    @section ('content')
        <div class="col-md-8 blog-main">

            <h2 class="blog-post-title">  {{ $post->title }} </h2>

            <p class="blog-post-meta"> {{ $post->created_at->toFormattedDateString() }} <a href="#"> Damian </a></p>

            <hr>

            <p> {{ $post->body }} </p>

            <hr>

            <div class="comments">

                <ul class="list-group">
                    @foreach($post->comments as $comment)

                        <li class="list-group-item">
                            <strong>
                                {{ $comment->created_at->diffForHumans() }}:
                            </strong>
                                {{ $comment->body }}

                        </li>
                    @endforeach
                </ul>

            </div>

            <hr>

            <div class="card">

                <div class="card-block">

                    <form method="POST" action="/posts/{{$post->id}}/comments">

                        @include('layouts.errors')
                        {{ csrf_field() }}


                        <!-- incase we would like to make a PATCH or DELETE req, one needs extra field: -->
                        <!-- {{ method_field('PATCH') }} -->
                        <div class="form-group">

                            <textarea class="form-control" name="body" placeholder="Your comment here." ></textarea>

                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-primary">Add comment</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    @endsection
