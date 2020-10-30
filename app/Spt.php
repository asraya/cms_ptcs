<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Spt extends Model
{
    protected $table = 'tran_spt';
    protected $primaryKey = 'spt_id';
    protected $fillable = [
        'spt_no',
        'requester_id',
        'emp_id',
        'position',
        'destination',
        'purpose',
        'spt_start',
        'spt_end',
    ];
   
    /**
     * Return the autonumber configuration array for this model.
     *
     * @return array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
    public function data()
    {
        return $this->belongsTo('App\UserModel');
    
    }
}