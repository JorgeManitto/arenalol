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
        Schema::create('arguments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_esp')->nullable();
            $table->string('pick')->nullable();
            $table->string('tier')->nullable();
            $table->string('games')->nullable();
            $table->text('src')->nullable();
            $table->text('description')->nullable();
            $table->text('description_esp')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arguments');
    }
};
