<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Spatie\Permission\Traits\HasRoles;

class Spt extends Model
{
    use AutoNumberTrait;
    protected $table = 'tran_spt';

    /**
     * Return the autonumber configuration array for this model.
     *
     * @return array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getAutoNumberOptions()
    {
        return [
            'code' => [
                'format' => function () {
                    return date('Y.m.d') . '/INV/?';
                },
                'length' => 5
            ]
        ];
    }
    public function data()
    {
        return $this->belongsTo('App\UserModel');
    
    }
}