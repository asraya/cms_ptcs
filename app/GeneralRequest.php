<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class GeneralRequest extends Model
{
    protected $table = 'tran_general';
    
    public function getAutoNumberOptions()
    {
        return [
            'code' => [
                'format' => 'SO.?', // Format kode yang akan digunakan.
                'length' => 5 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}

