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
        Schema::create('temoignages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pseudo')->nullable();
            $table->text('description');
            $table->string('profession')->nullable();
            $table->Boolean('etat')->default(0);
            $table->string('photo')->nullable(); //La photo sera le nom du champ photo dans la table users
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temoignages');
    }
};
