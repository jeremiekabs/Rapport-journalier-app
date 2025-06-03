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
            $table->id();
            $table->string('nom')->unique(); // Nom du produit
            $table->text('description')->nullable(); // Description optionnelle
            $table->decimal('prix', 10, 2); // Prix du produit
            $table->integer('stock')->default(0); // Quantité disponible en stock
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade'); // Liaison avec la table 'categories'
            $table->timestamps();
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
