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
        Schema::create('sinergies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();

            $table->string('first_champ')->nullable();
            $table->string('second_champ')->nullable();

            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            
            $table->text('first_item')->nullable();
            $table->text('second_item')->nullable();
            
            $table->string('first_argument')->nullable();
            $table->string('second_argument')->nullable();

            $table->string('status')->nullable();
            $table->string('tier')->nullable();
            $table->string('dificulty')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinergies');
    }
};
