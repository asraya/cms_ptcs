<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class IThelpdesk extends Model
{
    use AutoNumberTrait;

    protected $table = 'tran_helpdesk';
        // protected $primaryKey = 'help_ticket';
        protected $primaryKey = 'help_ticket';
        protected $fillable = ['help_id','help_ticket','help_level','emp_id','help_type','help_note','help_solve','help_solver','help_status','help_file','logs_id'];

        const CREATED_AT = 'help_reqdate';
        const UPDATED_AT = 'help_solvedate';

 public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getAutoNumberOptions()
    {
        return [
            'help_ticket' => [
                'format' => function () {
                    return $this->help_ticket . '0000' .  date('y') . 'G' . '?' . $this->help_ticket; 
                },
                'length' => 5
            ]
        ];
    }
}
