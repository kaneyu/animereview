<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function viewpost()
    {
        return $this->belongsTo('App\Viewpost');
    }
}
