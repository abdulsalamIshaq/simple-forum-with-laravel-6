<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'category_id', 'user_id'
    ];

    public function replies() {
        return $this->hasMany('App\comment');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }    
    
    public function category() {
        return $this->belongsTo('App\category');
    }
}
