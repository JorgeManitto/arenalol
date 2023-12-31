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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_esp')->nullable();
            $table->text('description')->nullable();
            $table->text('description_esp')->nullable();
            $table->text('plaintext')->nullable();
            $table->text('plaintext_esp')->nullable();
            $table->text('image')->nullable();
            $table->text('into')->nullable();
            $table->text('stats')->nullable();
            $table->text('gold')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
