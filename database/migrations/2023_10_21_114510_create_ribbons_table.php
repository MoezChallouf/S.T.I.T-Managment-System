<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRibbonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ribbons', function (Blueprint $table) {
            $table->id();
            $table->String('usine');
            $table->string('references');
            $table->String('color');
            $table->String('type');
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
        Schema::dropIfExists('ribbons');
    }
}
