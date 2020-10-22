<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stationary extends Model
{
        protected $guarded = [];

    protected $table = 'para_stationary';
    protected $primaryKey = 'id_item';
    public function user_modify()
	{
		return $this->belongsTo('App\Model\User', 'user_modified');
	}
    
	public function media_image_1()
	{
		return $this->belongsTo('App\Model\MediaLibrary', 'img_id');
	}
}
