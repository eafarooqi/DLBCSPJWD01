<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');

            $table->softDeletes();

            // Foreign Key
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });

        // Sub Categories table
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->string('name');

            $table->softDeletes();

            // Foreign Key
            $table->foreign('parent_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
        Schema::dropIfExists('categories');
    }
};
