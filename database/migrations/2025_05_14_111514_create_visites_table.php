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
        Schema::create('visites', function (Blueprint $table) {
            $table->id();
            
            $table->date('date');
            $table->time('heure_entree');
            $table->time('heure_sortie')->nullable();
            $table->string('nom', 70);
            $table->string('prenom', 70);
            $table->string('qualite_personne', 70);
            $table->string('entreprise', 100)->nullable();
            $table->string('particulier', 100)->nullable();
            $table->string('telephone', 20);
            $table->string('email', 100)->nullable();
            $table->text('raison_visite')->nullable();
            $table->text('produit_service_demande')->nullable();
            $table->enum('vente_directe', ['NA', 'OUI', 'NON']);
            $table->enum('visite_site', ['NA', 'OUI', 'NON']);
            $table->enum('vente', ['NA', 'OUI', 'NON']);
            $table->text('commentaires')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visites');
    }
};
