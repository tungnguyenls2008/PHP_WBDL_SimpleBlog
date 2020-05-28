@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="{{asset('/storage/cover_images/'.$post->cover_image)}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}}</small>
                        <br>
                        <small>Written By <h5>{{$post->user->name}}</h5></small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
    <p>No Posts Found!</p>

    @endif
@endsection