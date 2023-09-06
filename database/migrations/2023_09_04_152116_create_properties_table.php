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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('slug')->unique();
            $table->integer('air_layer');
            $table->integer('price');
            $table->integer('bedroom');
            $table->integer('rooms_num');
            $table->integer('floor');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->boolean('sold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
