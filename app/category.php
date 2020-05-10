<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    
    protected $fillable = [
        'catTitle'
    ];

    public function post() {
        return $this->hasMany('App\post');
    }
}
