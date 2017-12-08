<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;
use Telegram\Bot\Api;

use App\Update;
use App\Tuser;
use App\Chat;

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

    \Log::info("\$updates = ".json_encode($updates));
    foreach($updates as $update){
      $data = [
        'id' => $update['update_id'],
        'message_id' => $update['message']['message_id'],
        'from_id' => $update['message']['from']['id'],
        'chat_id' => $update['message']['chat']['id'],
        'date' => $update['message']['date'],
        'text' => isset($update['message']['text']) ? $update['message']['text'] : "",
        'type' => isset($update['message']['entities']) ? $update['message']['entities'][0]['type'] : "",
        'new_chat_member' => isset($update['message']['new_chat_member']) ? $update['message']['new_chat_member']['id'] : "",
        'left_chat_member' => isset($update['message']['left_chat_member']) ? $update['message']['left_chat_member']['id'] : "",
      ];

      $save = Update::firstOrCreate($data);

      $data_tuser = [
        'id' => $update['message']['from']['id'],
        'username' => isset($update['message']['from']['username']) ? $update['message']['from']['username'] : "",
        'first_name' => isset($update['message']['from']['first_name']) ? $update['message']['from']['first_name'] : "",
        'last_name' => isset($update['message']['from']['last_name']) ? $update['message']['from']['last_name'] : "",
        'language_code' => $update['message']['from']['language_code'],
      ];
      $tuser = Tuser::firstOrCreate($data_tuser);

      $data_chat = [
        'chat_id' => (string) $update['message']['chat']['id'],
        'username' => isset($update['message']['from']['username']) ? $update['message']['from']['username'] : "",
        'first_name' => isset($update['message']['from']['first_name']) ? $update['message']['from']['first_name'] : "",
        'last_name' => isset($update['message']['from']['last_name']) ? $update['message']['from']['last_name'] : "",
        'type' => $update['message']['chat']['type'],
        'title' => isset($update['message']['chat']['title']) ? $update['message']['chat']['title'] : "",
        'all_members_are_administrators' => 0,
      ];

      $chat = Chat::firstOrCreate($data_chat);
    }

    echo "<pre>";
    print_r($updates);
  }

  public function testing()
  {
    $chat_id = '151065522';
    $this->telegram->sendMessage(['chat_id' => $chat_id, 'text' => Inspiring::quote()]);
  }
}
