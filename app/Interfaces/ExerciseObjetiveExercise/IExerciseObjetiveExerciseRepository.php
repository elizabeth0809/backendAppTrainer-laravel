<?php

namespace App\Interfaces\ExerciseObjetiveExercise;

use App\DTOs\ExerciseObjetiveExercise\DTOsExerciseObjetiveExercise;

interface IExerciseObjetiveExerciseRepository
{
    public function getAllExerciseObjetiveExercise();
    public function getExerciseObjetiveExerciseById($id);
    public function createExerciseObjetiveExercise(DTOsExerciseObjetiveExercise $data);
    public function updateExerciseObjetiveExercise(DTOsExerciseObjetiveExercise $data, $id);
    public function deleteExerciseObjetiveExercise($id);
}
