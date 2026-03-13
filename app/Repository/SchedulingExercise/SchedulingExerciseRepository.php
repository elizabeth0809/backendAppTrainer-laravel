<?php

namespace App\Repository\SchedulingExercise;

use App\DTOs\SchedulingExercise\DTOsSchedulingExercise;
use App\Interfaces\SchedulingExercise\ISchedulingExerciseRepository;
use App\Models\SchedulingExercise;

class SchedulingExerciseRepository implements ISchedulingExerciseRepository
{
    public function getAllSchedulingExercises()
    {
        return SchedulingExercise::with([
            'exerciseObjetiveExercise.exercise',
            'exerciseObjetiveExercise.objetiveExercise',
            'userMeasurement',
            'openingSchedule',
            'user'
        ])->get();
    }


    public function getSchedulingExerciseById($id): SchedulingExercise
    {
        $SchedulingExercise = SchedulingExercise::where('id', $id)->first();
        if (!$SchedulingExercise) {
            throw new \Exception("No results found for SchedulingExercise with ID {$id}");
        }
        return $SchedulingExercise;
    }

    public function createSchedulingExercise(DTOsSchedulingExercise $data): SchedulingExercise
    {
        $result = SchedulingExercise::create($data->toArray());
        return $result;
    }

    public function updateSchedulingExercise(DTOsSchedulingExercise $data, SchedulingExercise $SchedulingExercise): SchedulingExercise
    {
        $SchedulingExercise->update($data->toArray());
        return $SchedulingExercise;
    }

    public function deleteSchedulingExercise(SchedulingExercise $SchedulingExercise): SchedulingExercise
    {
        $SchedulingExercise->delete();
        return $SchedulingExercise;
    }
}
