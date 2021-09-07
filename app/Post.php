<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function viewposts()
    {
        return $this->hasmany('App\Viewpost');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function animegenres()
    {
        return $this->belongsToMany('App\Animegenre')->withTimestamps();
    }
}
