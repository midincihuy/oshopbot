<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chat_id');
            $table->string('message_id');
            $table->string('from_id');
            $table->string('date');
            $table->string('text');
            $table->string('type');
            $table->string('new_chat_member');
            $table->string('left_chat_member');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('updates');
    }
}
