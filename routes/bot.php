<?php
Route::get('/bot/updates', 'BotController@getUpdates')->name('bot-updates');

Route::get('/bot/testing', 'BotController@testing')->name('bot-testing');
