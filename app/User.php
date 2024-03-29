<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function viewposts()
    {
        return $this->hasmany('App\Viewpost');
    }
    
    public function posts()
    {
        return $this->hasmany('App\Post');
    }
    
    public function favorates()
    {
        return $this->hasMany('App\Favorate');
    }
    
    public function goods()
    {
        return $this->hasMany('App\Good');
    }
    
    public function replies()
    {
        return $this->hasmany('App\Reply');
    }
    
    public function nowanimeviews()
    {
        return $this->hasmany('App\Nowanimeview');
    }
    
}
