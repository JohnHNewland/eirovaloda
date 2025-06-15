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
        Schema::create('materials', function (Blueprint $table) {
            $table->id('material_id');
            $table->string('file_name', 50);
            $table->string('file_path');
            $table->string('description', 500);
            $table->integer('likes');
            $table->string('language', 30);
            $table->foreign('language')->references('language')->on('languages')->onDelete('cascade');
            $table->string('language_level', 30);
            $table->foreign('language_level')->references('language_level')->on('language_levels')->onDelete('cascade');
            $table->string('language_aspect', 30)->nullable();
            $table->foreign('language_aspect')->references('language_aspect')->on('language_aspects')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->foreignId('folder_id')->constrained('folders', 'folder_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
