<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;
use Telegram\Bot\Api;

use App\Chat;
use App\Tuser;
use App\Update;

use App\Webster;

class CheckController extends Controller
{
  public function chat()
  {
    $chat = Chat::all();
    return $chat;
  }

  public function update()
  {
    $update = Update::all();
    return $update;
  }
  public function tuser()
  {
    $tuser = Tuser::all();
    return $tuser;
  }

  public function absen()
  {
    $webster = Webster::where('userid', 601)->orderBy('id', 'desc')->limit(1)->get();
    return $webster;
  }
}
