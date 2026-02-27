<?php

namespace App\Interfaces\SchedulingExercise;

use App\DTOs\SchedulingExercise\DTOsSchedulingExercise;
use App\Models\SchedulingExercise;

interface ISchedulingExerciseRepository
{
    public function getAllSchedulingExercises();
    public function getSchedulingExerciseById($id): SchedulingExercise;
    public function createSchedulingExercise(DTOsSchedulingExercise $data): SchedulingExercise;
    public function updateSchedulingExercise(DTOsSchedulingExercise $data, SchedulingExercise $SchedulingExercise): SchedulingExercise;
    public function deleteSchedulingExercise(SchedulingExercise $SchedulingExercise): SchedulingExercise;
}
