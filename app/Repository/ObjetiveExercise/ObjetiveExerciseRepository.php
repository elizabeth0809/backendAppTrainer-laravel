<?php

namespace App\Repository\ObjetiveExercise;

use App\DTOs\ObjetiveExercise\DTOsObjetiveExercise;
use App\Interfaces\ObjetiveExercise\IObjetiveExerciseRepository;
use App\Models\ObjetiveExercise;

class ObjetiveExerciseRepository implements IObjetiveExerciseRepository
{
    public function getAllObjetiveExercises()
 {
       $ObjetiveExercise = ObjetiveExercise::all();
        return$ObjetiveExercise;
    }

    public function getObjetiveExerciseById($id): ObjetiveExercise
    {
        $ObjetiveExercise = ObjetiveExercise::where('id', $id)->first();
        if (!$ObjetiveExercise) {
            throw new \Exception("No results found for ObjetiveExercise with ID {$id}");
        }
        return $ObjetiveExercise;
    }

    public function createObjetiveExercise(DTOsObjetiveExercise $data): ObjetiveExercise
    {
        $result = ObjetiveExercise::create($data->toArray());
        return $result;
    }

    public function updateObjetiveExercise(DTOsObjetiveExercise $data, ObjetiveExercise $ObjetiveExercise): ObjetiveExercise
    {
        $ObjetiveExercise->update($data->toArray());
        return $ObjetiveExercise;
    }

    public function deleteObjetiveExercise(ObjetiveExercise $ObjetiveExercise): ObjetiveExercise
    {
        $ObjetiveExercise->delete();
        return $ObjetiveExercise;
    }
}
