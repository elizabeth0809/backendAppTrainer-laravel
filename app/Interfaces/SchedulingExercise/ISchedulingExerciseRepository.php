<?php

namespace App\Interfaces\SchedulingExercise;

use App\DTOs\SchedulingExercise\DTOsSchedulingExercise;
use App\Models\SchedulingExercise;
use Illuminate\Support\Collection;

interface ISchedulingExerciseRepository
{
    public function getAllSchedulingExercises();
    public function getSchedulingByUserId($userId): Collection;
    public function getSchedulingExerciseById($id): SchedulingExercise;
    public function createSchedulingExercise(DTOsSchedulingExercise $data): SchedulingExercise;
    public function updateSchedulingExercise(DTOsSchedulingExercise $data, SchedulingExercise $SchedulingExercise): SchedulingExercise;
    public function deleteSchedulingExercise(SchedulingExercise $SchedulingExercise): SchedulingExercise;
}
