<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserApellidosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // Creo un campo apellido "apellido"
            Schema::table('users', function($table){
              $table->string('apellido', 250);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Elimino el campo apellido
            Schema::table('users', function ($table) {
                $table->dropColumn('apellido');
            });
    }
}
