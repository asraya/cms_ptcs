<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class IThelpdesk extends Model
{
    protected $table = 'tran_helpdesk';
        // protected $primaryKey = 'help_ticket';
 public function user()
    {
        return $this->belongsTo(User::class);
    }
}
