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
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->string('description');
            $table->string('image_secondaire')->nullable();
            $table->string('photo')->nullable();
            $table->integer('nb_view')->default(0);
            $table->string('slug')->unique();
            $table->timestamps();


            $table->unsignedBigInteger('blog_cat_id');
            $table->foreign('blog_cat_id')
                ->references('id')
                ->on('categorie_blogs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
