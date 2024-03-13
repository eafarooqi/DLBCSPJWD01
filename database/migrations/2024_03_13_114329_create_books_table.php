<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            // Foreign key fields
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('genre_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();

            // Book fields
            $table->string('name');
            $table->string('isbn')->nullable();
            $table->string('author')->nullable();
            $table->string('description')->nullable();
            $table->date('published_date')->nullable();
            $table->integer('total_pages')->nullable();

            // System timestamps
            $table->timestamps();
            $table->softDeletes();

            // Foreign keys references
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('genre_id')->references('id')->on('genres')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('language_id')->references('id')->on('languages')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
