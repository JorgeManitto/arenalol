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
        Schema::create('champions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug_name')->nullable();
            $table->string('tier')->nullable();
            $table->string('win')->nullable();
            $table->string('pick')->nullable();
            $table->string('ban')->nullable();
            $table->string('games')->nullable();

            $table->text('build')->nullable();
            $table->text('itemsSituacional')->nullable();
            $table->text('argument')->nullable();
            $table->text('skill_order')->nullable();
            $table->text('best_duo')->nullable();
            $table->text('bad_duo')->nullable();

            $table->string('version')->nullable();
            $table->string('key')->nullable();
            $table->string('title')->nullable();
            $table->text('info')->nullable();
            $table->text('image')->nullable();
            $table->string('tags')->nullable();
            $table->string('partype')->nullable();
            $table->text('stats')->nullable();

            $table->text('to_counter')->nullable();
            $table->text('best_for')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champions');
    }
};
