<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animegenre extends Model
{
    //
    public function posts()
    {
        return $this->belongsToMany('App\Post')
                        ->using('App\AnimegenrePost')
                        ->withPivot([
                            'animegenre_id',
                            'post_id'
                        ])
                        -> withTimestamps();
    }
}
