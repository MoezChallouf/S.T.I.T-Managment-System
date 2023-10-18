<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMecaniciensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mecaniciens', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string('phone_number');
            $table->string("nom_piece"); //piéce de rechange
            $table->string("intervention");
            $table->string("remarque");
            $table->string("car");
            $table->string("date");
            $table->string("prix");
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
        Schema::dropIfExists('mecaniciens');
    }
}
