<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $guarded=[];

    use SoftDeletes;
    public function user(){
        return $this->belongsTo(User::class,'created_by','id');

    }

    public function path(){

        return url('/posts/'.$this->id);
    }

}
