<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaColores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('colores', function (Blueprint $table) {
            $table->increments('idColor');
            $table->string('descriColor',45);
            $table->string('RGB',6);
            $table->string('creadoPor',50);
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
        Schema::drop('colores');
    }
}
