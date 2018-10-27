<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_name');
            $table->text('background')->nullable();
            $table->text('delimitation')->nullable();
            $table->text('solution')->nullable();
            $table->text('requerements')->nullable();
            $table->text('diffusion')->nullable();
            $table->text('evaluation')->nullable();
            $table->integer('finished')->default(0);
            $table->integer('user_id');
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
        Schema::dropIfExists('planning');
    }
}
