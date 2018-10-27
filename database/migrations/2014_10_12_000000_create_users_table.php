<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('password');
            $table->integer('age')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('address')->nullable();
            $table->string('degree')->nullable();
            $table->string('career')->nullable();
            $table->integer('level')->nullable();
            $table->float('average')->nullable();
            $table->float('score')->nullable();
            $table->float('pay')->nullable();
            $table->integer('position_id');
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
