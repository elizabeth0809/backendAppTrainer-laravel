<?php

namespace App\Interfaces\ObjetiveExercise;

use App\DTOs\ObjetiveExercise\DTOsObjetiveExercise;

interface IObjetiveExerciseServices 
{
    public function getAllObjetiveExercises();
    public function getObjetiveExerciseById($id);
    public function createObjetiveExercise(DTOsObjetiveExercise $data);
    public function updateObjetiveExercise(DTOsObjetiveExercise $data, $id);
    public function deleteObjetiveExercise($id);
}
