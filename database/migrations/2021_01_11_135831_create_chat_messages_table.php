<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMessagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->timestamp('sender_delete_at')->nullable();
            $table->timestamp('receiver_delete_at')->nullable();
            $table->timestamp('viewed_at')->nullable();
            $table->string('files')->nullable();
            $table->integer('sender_id')->unsigned();
            $table->integer('chat_discussion_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('chat_discussion_id')->references('id')->on('chat_discussions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chat_messages');
    }
}
