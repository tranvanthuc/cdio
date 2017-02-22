<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    protected $fillable = ['username', 'password', 'name', 'email', 'phone', 'address', 'image', 'level_id', 'specialization_id'];

    public function level()
    {
    	return $this->belongsTo('App\Level');
    }

    public function major()
    {
    	return $this->belongsTo('App\Major');
    }

    public function news()
    {
    	return $this->hasMany('App\News');
    }

    public function reports()
    {
        return $this->hasMany('App\Report');
    }
}
