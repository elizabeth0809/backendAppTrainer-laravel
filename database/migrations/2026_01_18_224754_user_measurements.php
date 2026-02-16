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
          Schema::create('user_measurements', function (Blueprint $table) {
        $table->id();
        $table->float('weight');
        $table->integer('age');
        $table->float('height');
        $table->enum('gender', ['male', 'female','other'])->default('male');
        $table->enum('level', ['beginner','intermediate', 'advanced'])->default('beginner');
        $table->timestamps();

         $table->foreignId('user_id')
          ->constrained('users')
          ->cascadeOnDelete();
   });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_measurements');
    }
};
