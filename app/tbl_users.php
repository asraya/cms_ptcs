<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_users extends Model
{
    /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'tbl_users';

  /**
  * The database primary key value.
  *
  * @var string
  */
  protected $guarded = ['user_id'];

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = [
      'fname', 'lname','mname','contact_no','gender','user_id','birthdate'
  ];

  /**
   * The roles that belong to the User.
   */
  public function users()
  {
    return $this->belongsTo('App\User', 'user_id');
  }
}
