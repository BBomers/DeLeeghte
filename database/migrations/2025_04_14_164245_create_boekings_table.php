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
        Schema::create('boekings', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('uuid_id')->constrained('uuids')->onDelete('cascade');
            $table->date("datum");
            $table->decimal('prijs', 8, 2);
            $table->boolean("voldaan");
            $table->string("mollie_id")->nullable();
            $table->integer("stek");
            $table->boolean("dagdeel_1");
            $table->boolean("dagdeel_2");
            $table->boolean("dagdeel_3");
            $table->boolean("arrangement");
            $table->boolean("betaling");
            $table->boolean("regelement");
            $table->integer("pallets_2mm");
            $table->integer("pallets_4mm");
            $table->integer("pallets_6mm");
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boekings');
    }
};
