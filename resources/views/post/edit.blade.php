@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('message'))
                    <div class="alert alert-danger" style="color: red" >
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card-header">Change your Post</div>
                <div class="card-body">
                    <form action="/posts/{{$post->id}}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" value="{{$post->title}}">
                            <small id="titleHelp" class="form-text text-muted">Give your post a title.</small>
                        </div>
                        @error('title')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" rows="20" >{{$post->content}}</textarea>
                            <small id="contentHelp" class="form-text text-muted">Giving a content.</small>
                            @error('content')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-primary btn-lg" aria-pressed="true">Submit</button>
                        <a href="/home/" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

