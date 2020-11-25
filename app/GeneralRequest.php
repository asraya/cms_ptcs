<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class GeneralRequest extends Model

{
    use AutoNumberTrait;

    protected $table = 'tran_general';
    protected $fillable = ['gen_id', 'gen_date_req', 'gen_update'];
    protected $primaryKey = 'gen_id';

    const CREATED_AT = 'gen_date_req';
    const UPDATED_AT = 'gen_update';

    public function getAutoNumberOptions()
    {
        return [
            'gen_ticket' => [
                'format' => function () {
                    return $this->gen_ticket . '0000' .  date('y') . 'G' . '?' . $this->spt_id; 
                },
                'length' => 5
            ]
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

