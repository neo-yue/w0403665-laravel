@extends('layouts.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-danger" style="color: red" >
            {{ session('message') }}
        </div>
    @endif
<h1>Admin User Detail</h1>

<form action="/managers/{{$manager->id}}" method="post">
    @method('DELETE')
    @csrf
<strong>Name</strong>
<p>{{$manager->name}}</p>

<strong>Email</strong>
<p>{{$manager->email}}</p>

<strong>Roles</strong>
@foreach($manager->roles as $role)
<p>{{$role->name}}</p>
@endforeach

    <a  href="/managers/"><button type="button" class="btn btn-primary btn-lg active m-2" role="button" aria-pressed="true">< Back</button></a>
    <a  href="/managers/{{$manager->id}}/edit"><button type="button" class="btn btn-warning btn-lg active m-2">Edit</button></a>
    <button type="submit" class="btn btn-danger btn-lg active m-2">DELETE</button>


</form>
@endsection
