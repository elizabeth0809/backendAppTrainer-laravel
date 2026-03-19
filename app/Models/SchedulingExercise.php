<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchedulingExercise extends Model
{
    use HasFactory;

    protected $table = 'schedules_exercises';

    protected $fillable = [
        'name',
        'user_id',
        'scheduled_date',
        'exercise_objetive_exercise_id',
        'opening_schedule_id',
    ];

    public function exerciseObjetiveExercise()
    {
        return $this->belongsTo(ExerciseObjetiveExercise::class);
    }

    public function userMeasurement()
    {
        return $this->belongsTo(UserMeasurement::class);
    }

    public function openingSchedule()
    {
        return $this->belongsTo(OpeningSchedule::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
