<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('pseudo')->nullable();
            $table->string('avatar')->nullable();
            $table->string('country')->nullable();
            $table->enum('status', ['REJECTED', 'PENDING', 'ACCEPTED', 'SAVE'])->default('PENDING');
            $table->enum('gender', ['F', 'M'])->nullable();
            $table->string('age')->nullable();
            $table->enum('type', ['CHILDREN', 'GODFATHER'])->default('CHILDREN');
            $table->text('happen')->nullable();
            $table->string('profession')->nullable();
            $table->string('language')->nullable();
            $table->text('profile')->nullable();
            $table->timestamp('last_login')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
