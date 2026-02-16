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
          Schema::create('opening_schedules', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->enum('day', [
        'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'
    ]);
        $table->time('start_time');
        $table->time('endtime');
        $table->timestamps();
   });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_schedules');
    }
};
