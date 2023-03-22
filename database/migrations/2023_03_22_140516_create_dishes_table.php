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
            $table->string('nome', 200);
            $table->decimal('prezzo', 5, 2)->unsigned();
            $table->text('ingredienti');
            $table->string('immagine')->nullable();
            $table->string('slug');
            $table->boolean('disponibile')->default(1);
            $table->string('tipologia', 50);
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
