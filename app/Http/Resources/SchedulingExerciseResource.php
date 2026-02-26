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
            'objetive_exercise' => new ObjetiveExerciseResource($this->whenLoaded('objetiveExercise')),
            'user_measurement' => new UserMeasurementResource($this->whenLoaded('userMeasurement')),
            'opening_schedule' => new OpeningScheduleResource($this->whenLoaded('openingSchedule')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
