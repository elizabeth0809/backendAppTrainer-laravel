<?php

namespace App\Repository\Exercise;

use App\DTOs\Exercise\DTOsExercise;
use App\Interfaces\Exercise\IExerciseRepository;
use App\Models\Exercise;

class ExerciseRepository implements IExerciseRepository
{
    public function getAllExercises()
    {
        $Exercises = Exercise::all();
        return $Exercises;
    }

    public function getExerciseById($id): Exercise
    {
        $Exercise = Exercise::where('id', $id)->first();
        if (!$Exercise) {
            throw new \Exception("No results found for Exercise with ID {$id}");
        }
        return $Exercise;
    }

    public function createExercise(DTOsExercise $data): Exercise
    {
        $result = Exercise::create($data->toArray());
        return $result;
    }

    public function updateExercise(DTOsExercise $data, Exercise $Exercise): Exercise
    {
        $Exercise->update($data->toArray());
        return $Exercise;
    }

    public function deleteExercise(Exercise $Exercise): Exercise
    {
        $Exercise->delete();
        return $Exercise;
    }
}
