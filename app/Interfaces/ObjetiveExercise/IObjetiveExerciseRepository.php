<?php

namespace App\Interfaces\ObjetiveExercise;

use App\DTOs\ObjetiveExercise\DTOsObjetiveExercise;
use App\Models\ObjetiveExercise;

interface IObjetiveExerciseRepository 
{
    public function getAllObjetiveExercises();
    public function getObjetiveExerciseById($id): ObjetiveExercise;
    public function createObjetiveExercise(DTOsObjetiveExercise $data): ObjetiveExercise;
    public function updateObjetiveExercise(DTOsObjetiveExercise $data, ObjetiveExercise $ObjetiveExercise): ObjetiveExercise;
    public function deleteObjetiveExercise(ObjetiveExercise $ObjetiveExercise): ObjetiveExercise;
}
