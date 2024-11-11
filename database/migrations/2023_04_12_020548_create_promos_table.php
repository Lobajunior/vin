<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('prix');
            $table->float('nb_promo')->default(1);
            $table->Integer('nb_jours')->default(1);
            $table->boolean('etat');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')
                ->references('id')
                ->on('produits')
                ->onDelete('cascade'); 
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
