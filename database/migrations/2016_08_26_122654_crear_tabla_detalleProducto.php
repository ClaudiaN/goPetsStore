<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDetalleProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleproducto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idProducto')->unsigned();
            $table->index('idProducto');            
            $table->foreign('idProducto')
            ->references('id')->on('productos')
            ->onDelete('cascade');
            $table->integer('idColor')->unsigned();
            $table->index('idColor');
            $table->foreign('idColor')
            ->references('idColor')->on('colores')
            ->onDelete('cascade');
            $table->integer('idTalla')->unsigned();
            $table->index('idTalla');
            $table->foreign('idTalla')
            ->references('idTalla')->on('tallas')
            ->onDelete('cascade');
            $table->decimal('peso');
            $table->decimal('precioVenta');
            $table->decimal('precioEnvio');
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
        Schema::drop('detalleproducto');
    }
}
