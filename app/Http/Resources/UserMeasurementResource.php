<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserMeasurementResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'weight' => $this->weight,
            'age' => $this->age,
            'height' => $this->height,
            'gender' => $this->gender,
            'level' => $this->level,
        ];
    }
}

