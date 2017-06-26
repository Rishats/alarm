<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Working extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('demo_on')->default(0);
            $table->tinyInteger('temperature_on')->default(0);
            $table->tinyInteger('co_on')->default(0);
            $table->tinyInteger('warning_on')->default(0);
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
        Schema::drop('working');
    }
}
