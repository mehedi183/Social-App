<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use \Illuminate\Support\Facades\Cache;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function posts()
    {
    	return $this->hasMany('App\Post');
    }
        public function likes()
    {
    	return $this->hasMany('App\Like');
    }


    public function isOnline()
    {
    	return Cache::has('user_online_'.$this->id);
    }
}
