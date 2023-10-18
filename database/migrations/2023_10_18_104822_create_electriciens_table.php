<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectriciensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electriciens', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string('phone_number'); //piéce de rechange
            $table->string("intervention");
            $table->string("remarque");
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
        Schema::dropIfExists('electriciens');
    }
}
