<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webster extends Model
{
  protected $connection = 'mysql2';
  protected $table = 'webster_checkinout';

  public function user()
  {
    return $this->belongsTo('App\Websteruser', 'userid', 'userid');
  }
}
