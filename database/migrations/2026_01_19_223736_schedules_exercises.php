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
          Schema::create('schedules_exercises', function (Blueprint $table) {
        $table->id();
        $table->string('name');
       $table->time('start_time');
        $table->time('end_time');
        $table->timestamps();
        $table->foreignId('user_id')
          ->constrained('users')
          ->cascadeOnDelete();
         $table->foreignId('exercise_id')
              ->constrained('exercises')
              ->cascadeOnDelete();

        $table->foreignId('user_measurement_id')
              ->constrained('user_measurements')
              ->cascadeOnDelete();

        $table->foreignId('opening_schedule_id')
              ->constrained('opening_schedules')
              ->cascadeOnDelete();
   });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules_exercises');
    }
};
