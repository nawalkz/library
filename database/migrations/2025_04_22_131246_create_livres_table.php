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
        Schema::disableForeignKeyConstraints();

        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->unsignedBigInteger('auteur_id');
            $table->foreign('auteur_id')->references('id')->on('auteurs');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->string('nombre_inventaire');
            $table->unsignedBigInteger('editeur_id');
            $table->foreign('editeur_id')->references('id')->on('editeurs');
            $table->string('image')->nullable();
            $table->bigInteger('nombre_page');
            $table->date('edition');
            $table->string('isbn');
            $table->string('statut')->default('disponible');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
