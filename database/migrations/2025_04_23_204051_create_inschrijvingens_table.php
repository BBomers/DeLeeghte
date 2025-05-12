<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inschrijvingens', function (Blueprint $table) {
            $table->id();

            $table->foreignId('wedstrijd_id')->constrained()->onDelete('cascade');

            // Persoon 1 (verplicht)
            $table->foreignId('uuid_id')->constrained('uuids')->onDelete('cascade');
            $table->integer('stek')->nullable();

            // Persoon 2 (optioneel)
            $table->foreignId('uuid_id_two')->nullable()->constrained('uuids')->onDelete('cascade');
            $table->integer('stek_two')->nullable();

            // Persoon 3 (optioneel)
            $table->foreignId('uuid_id_tree')->nullable()->constrained('uuids')->onDelete('cascade');
            $table->integer('stek_tree')->nullable();

            // Persoon 4 (optioneel)
            $table->foreignId('uuid_id_four')->nullable()->constrained('uuids')->onDelete('cascade');
            $table->integer('stek_four')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inschrijvingens');
    }
};
