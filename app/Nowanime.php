<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nowanime extends Model
{
    //
    public function nowanimeviews()
    {
        return $this->hasmany('App\Nowanimeview');
    }
}
