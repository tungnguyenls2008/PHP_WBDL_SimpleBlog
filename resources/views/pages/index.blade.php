@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h1>Welcome To My Blog</h1>
        <p>This is My Home Page</p>
        @guest
        <p><a class=" btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class=" btn btn-success btn-lg" href="/login" role="button">Register</a></p>
        @else
        <h3>Feel free to write whatever you want.</h3>
        @endguest
    </div>


@endsection