<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTallas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tallas', function (Blueprint $table) {
            $table->increments('idTalla');
            $table->string('descriTalla',50);
            $table->string('medidas',30);
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
       Schema::drop('tallas');
    }
}
