<?php

namespace App\Interfaces\Exercise;

use App\DTOs\Exercise\DTOsExercise;
use App\Models\Exercise;

interface IExerciseRepository
{
    public function getAllExercises();
    public function getExerciseById($id): Exercise;
    public function createExercise(DTOsExercise $data);//: Exercise;
    public function updateExercise(DTOsExercise $data, Exercise $Exercise): Exercise;
    public function deleteExercise(Exercise $Exercise): Exercise;
}
