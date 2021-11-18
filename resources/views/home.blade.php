@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('message'))
                    <div class="alert alert-danger" style="color: red" >
                        {{ session('message') }}
                    </div>
                @endif
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            @if (Auth::user())
                                <a href="/posts/create" class="btn btn-dark">Create new Post</a>
                                You are logged in!
                            @endif
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">My Questionnaires</div>

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($posts as $post)
                                    <form action="/posts/{{$post->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                    <li class="list-group-item">
                                        <a href="{{$post->path()}}">{{$post->title}}</a>
                                        <p>
                                            {{$post->updated_at}}
                                        </p>
                                        @if (Auth::user())
                                            @if (Auth::user()->id==$post->create_by)
                                                <a  href="/posts/{{$post->id}}/edit"><button type="button" class="btn btn-warning btn-lg active m-2">Edit</button></a>
                                            @endif
                                            @if (Auth::user()->id==$post->create_by or Auth::user()->Moderator())
                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                            @endif

                                        @endif
                                    </li>
                                @endforeach
                                    </form>
                            </ul>

                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
