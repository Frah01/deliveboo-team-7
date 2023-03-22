<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->float('prezzo', 5, 2)->unsigned();
            $table->string('ingredienti', 100);
            $table->string('immagine')->nullable();
            $table->string('slug');
            $table->boolean('disponibile')->default(1);
            $table->string('tipologie', 50);
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
        Schema::dropIfExists('dishes');
    }
};
