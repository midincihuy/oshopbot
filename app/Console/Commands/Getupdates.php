<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

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
    // \Log::info('getupdates:command Start');
    \Telegram::commandsHandler();
    // \Log::info('getupdates:command End');
  }
}
