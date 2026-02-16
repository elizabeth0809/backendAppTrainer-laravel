<?php

namespace App\Interfaces\SchedulingExercise;

use App\DTOs\SchedulingExercise\DTOsSchedulingExercise;

interface ISchedulingExerciseServices 
{
    public function getAllSchedulingExercises();
    public function getSchedulingExerciseById($id);
    public function createSchedulingExercise(DTOsSchedulingExercise $data);
    public function updateSchedulingExercise(DTOsSchedulingExercise $data, $id);
    public function deleteSchedulingExercise($id);
}
