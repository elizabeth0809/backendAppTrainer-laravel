<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ObjetiveExerciseResource extends JsonResource
{
      public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'exercise' => new ExerciseResource($this->whenLoaded('exercise')),
        ];
    }
}
