<?php

namespace App\Repository\ExerciseObjetiveExercise;

use App\DTOs\ExerciseObjetiveExercise\DTOsExerciseObjetiveExercise;
use App\Interfaces\ExerciseObjetiveExercise\IExerciseObjetiveExerciseRepository;
use App\Models\ExerciseObjetiveExercise;

class ExerciseObjetiveExerciseRepository implements IExerciseObjetiveExerciseRepository
{
    public function getAllExerciseObjetiveExercise()
    {
        return ExerciseObjetiveExercise::with([
            'exercise',
            'objetiveExercise',
        ])->get();
    }

    public function getExerciseObjetiveExerciseById($id): ExerciseObjetiveExercise
    {
        $ExerciseObjetiveExercise = ExerciseObjetiveExercise::where('id', $id)->first();
        if (!$ExerciseObjetiveExercise) {
            throw new \Exception("No results found for Exercise with ID {$id}");
        }
        return $ExerciseObjetiveExercise;
    }

    public function createExerciseObjetiveExercise(DTOsExerciseObjetiveExercise $data): ExerciseObjetiveExercise
    {
        $result = ExerciseObjetiveExercise::create($data->toArray());
        return $result;
    }

    public function updateExerciseObjetiveExercise(DTOsExerciseObjetiveExercise $data, $id): ExerciseObjetiveExercise
{
    $exerciseObjetiveExercise = ExerciseObjetiveExercise::findOrFail($id);
    $exerciseObjetiveExercise->update($data->toArray());

    return $exerciseObjetiveExercise;
}

public function deleteExerciseObjetiveExercise($id): ExerciseObjetiveExercise
{
    $exerciseObjetiveExercise = ExerciseObjetiveExercise::findOrFail($id);
    $exerciseObjetiveExercise->delete();

    return $exerciseObjetiveExercise;
}
}
