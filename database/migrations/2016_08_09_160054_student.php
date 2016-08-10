<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('students', function (Blueprint $table) {
        $table->bigInteger('std_id');
        $table->string('name', 100);
        $table->string('surname', 100);
        $table->integer('tel');
        $table->string('email', 100)->unique();
        $table->string('facebook', 100)->nullable();
        $table->string('faculty', 100);
        $table->string('major', 100);
        $table->timestamps();
        $table->string('secret_code', 100);
        $table->primary('std_id');
        $table->index('std_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
