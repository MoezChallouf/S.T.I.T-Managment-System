<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourneursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourneurs', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string('phone_number');
            $table->string("nom_piece");
            $table->string("description");
            $table->string("machine");
            $table->string("intervention");
            $table->string("date");
            $table->string("qty_in");
            $table->string("qty_out");
            $table->enum('status', ['En Stock', 'Epuisé'])->default('En Stock');
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
        Schema::dropIfExists('tourneurs');
    }
}
