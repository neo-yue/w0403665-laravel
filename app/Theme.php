<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    protected $guarded=[];
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class);
    }


}
