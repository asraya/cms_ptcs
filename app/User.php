<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
        use HasRoles;

                            //ini table users bawaan laravel untuk login

    // protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    
    protected $fillable = [
        'name', 'email', 'password', 'emp_id', 'user_email', 'user_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
  

    public function data()
    {
        return $this->belongsTo('App\UserModel');
    
    }
    public function tbl_users()
    {
        return $this->hasMany('App\tbl_users');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function cart()
    {
        return $this->belongsToMany(Stationary::class, 'para_stationary')->withPivot('stock_item');
    }
}
