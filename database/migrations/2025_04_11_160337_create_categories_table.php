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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('type');
            $table->longText('beschrijving');
            $table->string('kleur', 7);
            $table->integer('max');
            $table->integer('aantal_namen');
            $table->boolean('dagdeel_1');
            $table->boolean('dagdeel_2');
            $table->boolean('dagdeel_3');

            //stekkenplan
            $table->boolean('stek_1')->nullable();
            $table->boolean('stek_2')->nullable();
            $table->boolean('stek_3')->nullable();
            $table->boolean('stek_4')->nullable();
            $table->boolean('stek_5')->nullable();
            $table->boolean('stek_6')->nullable();
            $table->boolean('stek_7')->nullable();
            $table->boolean('stek_8')->nullable();
            $table->boolean('stek_9')->nullable();
            $table->boolean('stek_10')->nullable();
            $table->boolean('stek_11')->nullable();
            $table->boolean('stek_12')->nullable();
            $table->boolean('stek_13')->nullable();
            $table->boolean('stek_14')->nullable();
            $table->boolean('stek_15')->nullable();
            $table->boolean('stek_16')->nullable();

            $table->boolean('stek_1a')->nullable();
            $table->boolean('stek_8a')->nullable();
            $table->boolean('stek_9a')->nullable();
            $table->boolean('stek_16a')->nullable();
            

            
            $table->boolean('stek_17')->nullable();
            $table->boolean('stek_18')->nullable();
            $table->boolean('stek_19')->nullable();
            $table->boolean('stek_20')->nullable();
            $table->boolean('stek_21')->nullable();
            $table->boolean('stek_22')->nullable();
            $table->boolean('stek_23')->nullable();
            $table->boolean('stek_24')->nullable();
            $table->boolean('stek_25')->nullable();
            $table->boolean('stek_26')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
