<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nowanimeview extends Model
{
    //
    public function nowanime()
    {
        return $this->belongsTo('App\Nowanime');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User')
    }
}
