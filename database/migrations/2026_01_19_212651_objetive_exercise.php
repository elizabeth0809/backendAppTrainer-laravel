<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
          Schema::create('objetive_exercises', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
        $table->foreignId('exercise_id')
              ->constrained('exercises')
              ->cascadeOnDelete();

   });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('objetive_exercise');
    }
};
