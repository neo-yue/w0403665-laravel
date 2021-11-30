@extends('layouts.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-danger" style="color: red" >
            {{ session('message') }}
        </div>
    @endif

<div class="card mt-4">
    <div class="card-header">Manage Themes</div>
    <a href="/themes/create"><button type="button" class="btn btn-primary btn-lg ">Add New Theme</button></a>
    <div class="card-body">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ThemeId</th>
                <th scope="col">name</th>
            </tr>
            </thead>
            <tbody>

            @forelse($themes as $theme)
            <tr>
                <td>{{$theme->id}}</td>
                <td>{{$theme->name}}</td>
                <td>
                    <form action="/themes/{{$theme->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <a  href="/themes/{{$theme->id}}"><button type="button" class="btn btn-primary m-2">Details</button></a>
                        <a  href="/themes/{{$theme->id}}/edit"><button type="button" class="btn btn-warning m-2">Edit</button></a>

                        <button type="submit" class="btn btn-danger m-2">DELETE</button>
                    </form>

                </td>

            </tr>
            @empty
                <p>No theme to show</p>

            @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
