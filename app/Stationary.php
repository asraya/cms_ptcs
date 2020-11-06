<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stationary extends Model
{
        protected $guarded = [];
		protected $hidden = ['created_at'];

    protected $table = 'para_stationary';
    public function user_modify()
	{
		return $this->belongsTo('App\Model\User', 'user_modified');
	}
    
	public function media_image_1()
	{
		return $this->belongsTo('App\Model\MediaLibrary', 'img_id');
	}
}
