<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Club extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('clubs', function (Blueprint $table) {
        $table->string('club_id', 100);
        $table->string('club_name', 100);
        $table->string('club_secret_code', 100)->unique();
        $table->primary('club_id');
        $table->index('club_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clubs');
    }
}
