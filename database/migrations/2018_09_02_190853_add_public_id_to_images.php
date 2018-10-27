<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublicIdToImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->text('public_id')->after('img')->nullable();
        });

        Schema::table('images', function (Blueprint $table) {
            $table->text('public_id')->nullable();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->text('public_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function($table) {
            $table->dropColumn('public_id');
        });

        Schema::table('images', function($table) {
            $table->dropColumn('public_id');
        });

        Schema::table('events', function($table) {
            $table->dropColumn('public_id');
        });
    }
}
