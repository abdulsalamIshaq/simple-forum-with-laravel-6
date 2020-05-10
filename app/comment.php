<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $fillable = [
        'comment_contents', 'post_id', 'user_id'
    ];

    public function post() {
        return $this->belongsToMany('App\post');
    } 
    public function user() {
        return $this->belongsTo('App\user');
    }
}
