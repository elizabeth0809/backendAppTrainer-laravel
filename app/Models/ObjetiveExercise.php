<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ObjetiveExercise extends Model
{
    use HasFactory;
    protected $table = 'objetive_exercises';
    protected $fillable = [
        'name',
    ];
    public function exercises()
    {
        return $this->hasMany(Exercise::class, 'objetive_exercise_id');
    }
}
