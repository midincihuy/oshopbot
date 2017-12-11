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
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function chat()
  {
    $chat = Chat::all();
    return view('check.chat')->with('chat', $chat);
  }

  public function update()
  {
    $update = Update::paginate(2);
    return view('check.update')->with('update', $update);
  }
  public function tuser()
  {
    $tuser = Tuser::all();
    return view('check.tuser')->with('tuser', $tuser);
  }

  public function absen()
  {
    $webster = Webster::where('userid', 601)->orderBy('id', 'desc')->limit(1)->get();
    return $webster;
  }
}
