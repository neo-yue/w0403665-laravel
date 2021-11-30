<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
//    public  function __construct(){
//
//        $this->middleware('auth');
//
//    }

    public function create(){
        $authId=Auth::user()->id;


        return view('post.create',compact('authId'));
    }

    public function store(){


        $data=request()->validate([
            'title'=>'min:5',
            'content'=>'min:10',
            'created_by'=>'required'
        ]);


        $post=Post::create($data);

        session()->flash('confirm', 'Post successfully');

        return redirect('/home');
    }

    public function show(Post $post){

        $post->load('user');


        return view('post.show',compact('post'));

    }

    public function edit(Post $post ){

        return view('post.edit',compact('post'));
    }

    public function update(Post $post){

        $post->update($this->validateData());

        session()->flash('confirm', 'Update completed');

        return redirect('/posts/'.$post->id);
    }

    public function destroy(Post $post){
        $post->delete();
        $id = Auth::user()->id;
        $post->deleted_by=$id;
        $post->save();
        session()->flash('confirm', 'Successfully deleted posts');
        return redirect('/home');

    }

    protected function validateData(){
        return request()->validate([
            'title'=>'min:5',
            'content'=>'min:10',

        ]);
    }
}
