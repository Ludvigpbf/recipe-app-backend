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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('idref');
            /* $table->string('image');
            $table->text('ingredients');
            $table->integer('yield');
            $table->string('link');
            $table->integer('time');
            $table->text('allergens');
            $table->text('diets');
            $table->string('meal');
            $table->string('dish');
            $table->string('cuisine'); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
