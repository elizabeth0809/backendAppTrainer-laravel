<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchedulingExerciseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'scheduled_date' => $this->scheduled_date,
            'exercise_objetive_exercise' => new ExerciseObjetiveExerciseResource($this->whenLoaded('exerciseObjetiveExercise')),
            'user_measurement' => new UserMeasurementResource($this->whenLoaded('userMeasurement')),
            'opening_schedule' => new OpeningScheduleResource($this->whenLoaded('openingSchedule')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
