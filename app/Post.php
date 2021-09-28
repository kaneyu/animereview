<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    
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
        return $this->belongsToMany('App\Animegenre')
                        ->using('App\AnimegenrePost')
                        ->withPivot([
                            'animegenre_id',
                            'post_id'
                        ])
                        ->withTimestamps();
    }
    
    public function favorates()
    {
        return $this->hasMany('App\Favorate');
    }
    
    public function goods()
    {
        return $this->hasMany('App\Good');
    }
    
    protected $fillable = [
        "user_id",
        "anime_name",
        "summary",
        ];
    
    public function getPaginateByLimit(int $limit_count = 20)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
