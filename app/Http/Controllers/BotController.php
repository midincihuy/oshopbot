<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;
use Telegram\Bot\Api;

class BotController extends Controller
{
  protected $telegram;

  public function __construct(Api $telegram)
  {
    $this->telegram = $telegram;
  }

  public function getUpdates()
  {
    // $updates = $this->telegram->getUpdates();
    $updates = $this->telegram->commandsHandler();
    echo "<pre>";
    print_r($updates);
  }

  public function testing()
  {
    $chat_id = '151065522';
    $this->telegram->sendMessage(['chat_id' => $chat_id, 'text' => Inspiring::quote()]);
               // ->chatId($chat_id)
               // ->text(Inspiring::quote())
               // ->getResult();
  }
}
