<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tuser extends Model
{
  protected $fillable = [
      'id', 'username', 'first_name', 'last_name', 'language_code',
  ];
}
