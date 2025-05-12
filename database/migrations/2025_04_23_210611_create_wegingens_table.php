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
        Schema::create('wegingens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wedstrijd_id')->constrained()->onDelete('cascade');
            $table->foreignId('inschrijvingen_id')->constrained()->onDelete('cascade');
            $table->foreignId('uuid_id')->constrained()->onDelete('cascade');
            $table->double('weging');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wegingens');
    }
};
