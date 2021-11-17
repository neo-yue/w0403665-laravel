@extends('layouts.app')
@section('content')


<div class="card mt-4">
    <div class="card-header">User Administration</div>
    <a href="/managers/create"><button type="button" class="btn btn-primary btn-lg btn-block">Create New Admin User</button></a>
    <div class="card-body">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @forelse($managers as $manager)
            <tr>
                <td>{{$manager->name}}</td>
                <td>{{$manager->email}}</td>
                <td>
                @foreach($manager->roles as $role)
                        <p>○{{$role->name}}</p><br>
                    @endforeach
                </td>
                <td>
                    <form action="/managers/{{$manager->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <a  href="/managers/{{$manager->id}}"><button type="button" class="btn btn-primary m-2">Show</button></a>
                        <a  href="/managers/{{$manager->id}}/edit"><button type="button" class="btn btn-warning m-2">Edit</button></a>

                        <button type="submit" class="btn btn-danger m-2">DELETE</button>
                    </form>

                </td>

            </tr>
            @empty
                <p>No Admin users to show</p>

            @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
