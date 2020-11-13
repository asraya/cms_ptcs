<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historystock extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tbluser()
    {
        return $this->belongsTo(Tbl_users::class);
    }
    public function role()
    {
        return $this->hasMany(Roles::class);
    }

    public function order_details()
    {
        return $this->hasMany(HistorystockDetail::class);
    }
    

}
