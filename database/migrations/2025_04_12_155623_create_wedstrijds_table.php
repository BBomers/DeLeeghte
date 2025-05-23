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
        Schema::create('wedstrijds', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->foreignIdFor(\App\Models\Categorie::class)->constrained()->onDelete('cascade');
            $table->boolean('zichtbaarheid')->nullable();
            $table->date("date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedstrijds');
    }
};
