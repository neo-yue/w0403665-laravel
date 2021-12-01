<?php

namespace App\HTTP\Controllers;

use App\post;
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


        $post=post::create($data);

        session()->flash('confirm', 'Post successfully');

        return redirect('/home');
    }

    public function show(post $post){

        $post->load('user');


        return view('post.show',compact('post'));

    }

    public function edit(post $post ){

        return view('post.edit',compact('post'));
    }

    public function update(post $post){

        $post->update($this->validateData());

        session()->flash('confirm', 'Update completed');

        return redirect('/posts/'.$post->id);
    }

    public function destroy(post $post){
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
