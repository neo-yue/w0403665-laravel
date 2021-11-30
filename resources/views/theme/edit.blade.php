@extends('layouts.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-danger" style="color: red" >
            {{ session('message') }}
        </div>
    @endif
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit</h1>
            <form action="/themes/{{$theme->id}}" method="post">
                @method('PATCH')
                <div class="card mt-4">
                    <div class="card-header">Information</div>
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name"   value="{{$theme->name}}" autocomplete="off" >
                            @error('name') <p style="color: red">{{$message}}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label for="cdn_url">CDN Url</label>
                            <input name="cdn_url" type="url" class="form-control" id="cdn_url"  value="{{$theme->cdn_url}}">
                            @error('cdn_url') <p style="color: red">{{$message}}</p> @enderror
                        </div>
                        <input name="updated_by" type="hidden" id="updated_by" value="{{Auth::user()->id}}">

                    </div>
                </div>
                    <button type="submit"  class="btn btn-primary  btn-lg active"> Submit</button>
                    <a href="/themes/" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection('content')
