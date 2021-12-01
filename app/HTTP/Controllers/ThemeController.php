<?php

namespace App\HTTP\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function index()
    {

       $themes=\App\Theme::all();

        return view('theme.index', compact('themes'));

    }

    public function create(){
        $authId=Auth::user()->id;



        return view('theme.create',compact('authId'));
    }

    public function store(){


        $data=request()->validate([
            'name'=>'required',
            'cdn_url'=>'required',
            'created_by'=>'required'
        ]);



        $theme=Theme::create($data);

        return redirect('/themes/'.$theme->id);
    }

    public function show(Theme $theme){


        return view('theme.show',compact('theme'));

    }

    public function edit(Theme $theme ){


        return view('theme.edit',compact('theme'));
    }

    public function update(Theme $theme){

        $theme->update($this->validateData());
        $updated_by = Auth::user()->id;
        $theme->updated_by=$updated_by;
        $theme->save();

        return redirect('/themes/'.$theme->id);
    }

    public function destroy(Theme $theme){
        $theme->delete();
        $deleted_by = Auth::user()->id;
        $theme->deleted_by=$deleted_by;
        $theme->save();

        return redirect('/themes');

    }

    protected function validateData(){
        return request()->validate([
            'name'=>'required',
            'cdn_url'=>'required',

        ]);
    }



}
