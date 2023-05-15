<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id()->comment('The chat message ID');
            $table->integer('sender_id');
            $table->integer('receiver_id')->comment('The ID of the user who received the chat message');
            $table->text('message')->comment('The content of the chat message');
            $table->integer('read')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
