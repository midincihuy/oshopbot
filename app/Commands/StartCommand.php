<?php
namespace App\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
  protected $name = 'start';

  protected $description = 'Start Command';
  public function handle($arguments)
  {
    $this->replyWithMessage(['text' => 'Welcome To OshopBot :)']);
    $this->triggerCommand('help');
  }
}
