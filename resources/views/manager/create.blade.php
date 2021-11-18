@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Add New Admin User</h1>
                <form action="/managers" method="post">
                    <div class="card mt-4">
                        <div class="card-header">Your Information</div>
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name"  placeholder="Enter Name" autocomplete="off" >
                                @error('name') <p style="color: red">{{$message}}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" id="email"  placeholder="Enter Email">
                                @error('email') <p style="color: red">{{$message}}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" autocomplete="off"   placeholder="Enter Password">
                                @error('password') <p style="color: red">{{$message}}</p> @enderror
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
                    <button type="submit"  class="btn btn-primary  btn-lg active"> Add New Admin User</button>
                    <a href="/managers/" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection('content')
