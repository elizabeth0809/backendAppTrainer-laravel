<?php

namespace App\Interfaces\Exercise;

use App\DTOs\Exercise\DTOsExercise;

interface IExerciseServices 
{
    public function getAllExercises();
    public function getExerciseById($id);
    public function createExercise(DTOsExercise $data);
    public function updateExercise(DTOsExercise $data, $id);
    public function deleteExercise($id);
}
