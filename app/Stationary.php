<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stationary extends Model
{
        protected $guarded = [];

    protected $table = 'para_stationary';
    protected $primaryKey = 'id_item';

}
