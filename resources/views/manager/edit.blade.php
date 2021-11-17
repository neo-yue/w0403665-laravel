@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit</h1>
            <form action="/managers/{{$manager->id}}" method="post">
                @method('PATCH')
                <div class="card mt-4">
                    <div class="card-header">Information</div>
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="name" value="{{$manager->name}}" autocomplete="off" >
                            @error('name') <p style="color: red">{{$message}}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="email" value="{{$manager->email}}" autocomplete="off" >
                            @error('email') <p style="color: red">{{$message}}</p> @enderror
                        </div>
                        <div class="card-header">Roles</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @error('roleIds') <p style="color: red">{{$message}}</p> @enderror
                                @foreach($roles as $role)
                                    <li class="list-group-item">
                                        <input type="checkbox" name="roleIds[]"
                                               id="role{{$role->id}}"
                                               class="mr-2" value="{{$role->id}}">
                                        {{$role->name}}
                                    </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <button type="submit"  class="btn btn-primary btn-lg active">Save</button>
                <a  href="/managers/"><button type="button" class="btn btn-primary btn-lg active m-2" role="button" aria-pressed="true">Cancel</button></a>
            </form>
        </div>
    </div>
</div>
@endsection('content')
