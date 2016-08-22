<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Agregar el campo fecha de nacimiento y telefono a la tabla users
       Schema::table('users', function($table){
              $table->date('fecha_nac');
              $table->string('telefono', 100);
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
               Schema::table('users', function ($table) {
                $table->dropColumn('fecha_nac','telefono');
            });
    }
}
