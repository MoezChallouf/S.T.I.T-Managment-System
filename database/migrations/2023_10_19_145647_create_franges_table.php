<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franges', function (Blueprint $table) {
            $table->id();
            $table->String('usine');
            $table->string('references');
            $table->String('color');
            $table->String('frange');
            $table->integer('inQty');
            $table->integer('outQty');
            $table->string('date');
            $table->enum('status', ['En Stock', 'Epuisé'])->default('En Stock');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('franges');
    }
}
