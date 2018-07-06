@extends('layouts.master')

@section('content')
    <div class="col-md-8">
        <h1>PUBLISH A NEW POST!!!</h1>

        <form method="POST" action="/posts">

            @include('layouts.errors')

            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <!-- simplest form of valid. is by "required" in fields below -doesn`t work in all browsers! -->
                <input type="text" class="form-control" name="title" placeholder="Title" >
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" rows="8" cols="80" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
            
        </form>

    </div>
@endsection
