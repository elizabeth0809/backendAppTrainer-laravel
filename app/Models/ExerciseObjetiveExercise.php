<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ExerciseObjetiveExercise extends Pivot
{
    protected $table = 'exercise_objetive_exercises';

    protected $fillable = [
        'exercise_id',
        'objetive_exercise_id',
    ];
    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function objetiveExercise()
    {
        return $this->belongsTo(ObjetiveExercise::class, 'objetive_exercise_id');
    }
}
