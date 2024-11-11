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
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->string('photo');
            $table->string('images_secondaires')->nullable();;
            $table->string('type');
            $table->string('taille')->nullable();
            $table->string('pointure')->nullable();
            $table->string('couleur');
            $table->unsignedInteger('prix');
            $table->text('description')->nullable();
            $table->Boolean('etat')->default(0);
            $table->integer('nb_view')->default(0);
            $table->Boolean('is_djassa')->default(0);
            $table->unsignedInteger('qte_stock');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->unsignedBigInteger('sousCategorie_id');
            $table->foreign('sousCategorie_id')
                ->references('id')
                ->on('sous_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
