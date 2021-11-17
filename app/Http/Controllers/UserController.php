<?php

namespace App\Http\Controllers;

use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class UserController extends Controller
{
    public  function __construct(){

        $this->middleware('auth');

    }
    public function index()
    {

        $managers=\App\User::has('roles')->get();
        $managers->load('roles');

        return view('manager.index', compact('managers'));

    }

    public function create(){
    $roles=\App\role::all();


        return view('manager.create',compact('roles'));
    }

    public function store(\App\role $roles){


        $data=request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password' => 'required',
            'roleIds'=>'required'
        ]);
        $data['password'] = hash::make($data['password']);

        $manager=User::create($data);
        $roleIds = request()->input('roleIds');

        $manager->roles()->sync($roleIds);


        return redirect('/managers/'.$manager->id);
    }

    public function show(User $manager){

        $manager->load('roles');

        return view('manager.show',compact('manager'));

    }

    public function edit(User $manager ){
        $roles=\App\role::all();

        return view('manager.edit',compact('manager','roles'));
    }

    public function update(User $manager){

        $manager->update($this->validateData());
        $roleIds = request()->input('roleIds');
        $manager->roles()->sync($roleIds);

        return redirect('/managers');
    }

    public function destroy(User $manager){
        $manager->delete();
        $id = Auth::user()->id;
        $manager->deleted_by=$id;
        $manager->save();

        return redirect('/managers');

    }

    protected function validateData(){
        return request()->validate([
            'name'=>'required',
            'email'=>'required|email',

        ]);
    }
    }

