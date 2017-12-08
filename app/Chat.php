<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  protected $fillable = [
      'chat_id', 'title', 'username', 'first_name', 'last_name', 'language_code', 'type', 'all_members_are_administrators',
  ];
}
