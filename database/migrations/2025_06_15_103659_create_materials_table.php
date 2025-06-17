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
            $table->id('id');
            $table->string('file_name', 50);
            $table->string('file_path');
            $table->string('description', 500);
            $table->integer('likes')->default(0);
            $table->string('language_id', 30);
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('language_level_id', 30);
            $table->foreign('language_level_id')->references('id')->on('language_levels')->onDelete('cascade');
            $table->string('language_aspect_id', 30);
            $table->foreign('language_aspect_id')->references('id')->on('language_aspects')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('folder_id')->constrained('folders', 'id')->onDelete('cascade');
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
