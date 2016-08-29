<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInventario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('inventario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idDetalleProducto')->unsigned();
            $table->index('idDetalleProducto');            
            $table->foreign('idDetalleProducto')
            ->references('id')->on('detalleproducto')
            ->onDelete('cascade');
            $table->integer('stock')->unsigned();
            $table->integer('cantidad_minima')->unsigned();
            $table->integer('cantidad_maxima')->unsigned();
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
        Schema::drop('inventario');
    }
}
