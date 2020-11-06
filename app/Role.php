<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    } 
    public function getUserObject()
    	{
    		return $this->belongsToMany(User::class)->using(UserRole::class);
    	}
}
