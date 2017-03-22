<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_Id');
            $table->string('name');
            $table->string('address');
            $table->integer('fon');
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
        Schema::drop('infos');
    }
}
