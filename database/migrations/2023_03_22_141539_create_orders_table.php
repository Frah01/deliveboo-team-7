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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('nome');
            $table->string('cognome');
            $table->date('data');
            $table->decimal('prezzo_totale', 5, 2)->unsigned();
            $table->string('indirizzo', 100);
            $table->string('telefono', 13)->nullable();
            $table->string('email', 50)->nullable();
            $table->text('note')->nullable();
            $table->boolean('stato_ordine')->default(0);
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
        Schema::dropIfExists('orders');
    }
};
