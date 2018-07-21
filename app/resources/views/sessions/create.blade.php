@extends('layouts.master')

@section('content')
    <div class="col-md-8">
        <h1>Sign in</h1>

        <form method="POST" action="/login">

            @include ('layouts.errors')

            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email:</label>
                <!-- simplest form of valid. is by "required" in fields below -doesn`t work in all browsers! -->
                <input type="email" class="form-control" name="email" placeholder="Your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Your Password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>


        </form>

    </div>
@endsection
