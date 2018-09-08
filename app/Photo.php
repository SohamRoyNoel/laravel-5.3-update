<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
//    protected $uploads = '';
////'http://localhost/Goals/public/images/'

    protected $fillable = [
        'path'
    ];

//    public function getPathAttribute($photo){
//        return $this->uploads . $photo;
//    }

    public function post(){
        return $this->hasMany('App\Post');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
