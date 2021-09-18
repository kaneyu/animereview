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
    
    public function favorate()
    {
        return $this->hasMany('App\Favorate');
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
