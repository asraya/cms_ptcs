<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class GeneralRequest extends Model

{
    protected $table = 'tran_general';
    protected $fillable = ['gen_id', 'gen_date_req', 'gen_update'];
    protected $primaryKey = 'gen_id';

    const CREATED_AT = 'gen_date_req';
    const UPDATED_AT = 'gen_update';

    public function getAutoNumberOptions()
    {
        return [
            'code' => [
                'format' => 'SO.?', // Format kode yang akan digunakan.
                'length' => 10 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}

