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
            $table->unsignedBigInteger('project_id')->comment('The ID of the project that the chat message relates to');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->unsignedBigInteger('proposal_id')->nullable()->comment('The ID of the proposal that the chat message relates to (if applicable)');
            $table->foreign('proposal_id')->references('id')->on('proposals');
            $table->unsignedBigInteger('sender_id')->comment('The ID of the user who sent the chat message');
            $table->foreign('sender_id')->references('id')->on('users');
            $table->unsignedBigInteger('receiver_id')->comment('The ID of the user who received the chat message');
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->text('message')->comment('The content of the chat message');
            $table->enum('status', ['seen', 'unseen'])->default('unseen');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
