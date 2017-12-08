<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Update;
use App\Tuser;
use App\Chat;
/**
 *
 */
class Getupdates extends Command
{

  protected $name = 'getupdates:command';
  protected $description = 'Get Update For Commands Handler telegram';

  function __construct()
  {
    parent::__construct();
  }

  public function handle()
  {
    \Log::info('getupdates:command Start');
    $updates = \Telegram::commandsHandler();
    \Log::info('updates = '.json_encode($updates));

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

      // $data_tuser = [
      //   'id' => $update['message']['from']['id'],
      //   'username' => $update['message']['from']['username'],
      //   'first_name' => $update['message']['from']['first_name'],
      //   'last_name' => $update['message']['from']['last_name'],
      //   'language_code' => $update['message']['from']['language_code'],
      // ];
      // // $tuser = Tuser::firstOrCreate($data_tuser);
      //
      // $data_chat = [
      //   'chat_id' => (string) $update['message']['chat']['id'],
      //   'username' => $update['message']['from']['username'],
      //   'first_name' => $update['message']['from']['first_name'],
      //   'last_name' => $update['message']['from']['last_name'],
      //   'type' => $update['message']['chat']['type'],
      //   'title' => isset($update['message']['chat']['title']) ? $update['message']['chat']['title'] : "",
      //   'all_members_are_administrators' => 0,
      // ];

      // $chat = Chat::firstOrCreate($data_chat);
    }
    \Log::info('getupdates:command End');
  }
}
