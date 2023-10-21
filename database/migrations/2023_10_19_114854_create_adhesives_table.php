<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdhesivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adhesives', function (Blueprint $table) {
            $table->id();
            $table->String('usine');
            $table->String('type');
            $table->String('nom');
            $table->float('inQty');
            $table->float('outQty');
            $table->float('total');
            $table->string('date');
            $table->enum('status', ['En Stock', 'Epuisé'])->default('En Stock');
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
        Schema::dropIfExists('adhesives');
    }
}
