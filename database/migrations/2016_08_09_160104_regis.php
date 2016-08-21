<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Regis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('enrolls', function (Blueprint $table) {
        $table->increments('id');
        $table->bigInteger('std_id');
        $table->string('club_id', 100);
        $table->timestamps();
        $table->index('id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enrolls');
    }
}
