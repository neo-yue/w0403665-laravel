@extends('layouts.app')
@section('content')

    @if (session('message'))
        <div class="alert alert-danger" style="color: red" >
            {{ session('message') }}
        </div>
    @endif

<h1>Theme Details for {{$theme->name}}</h1>

<form action="/themes/{{$theme->id}}" method="post">
    @method('DELETE')
    @csrf
<strong>Name</strong>
<p>{{$theme->name}}</p>

<strong>Email</strong>
<p>{{$theme->cdn_url}}</p>


    <a  href="/themes/{{$theme->id}}/edit"><button type="button" class="btn btn-warning btn-lg active m-2">Edit</button></a>
    <button type="submit" class="btn btn-danger btn-lg active m-2">DELETE</button>
    <a  href="/themes/"><button type="button" class="btn btn-primary btn-lg active m-2" role="button" aria-pressed="true">Back to Themes</button></a>

</form>
@endsection
