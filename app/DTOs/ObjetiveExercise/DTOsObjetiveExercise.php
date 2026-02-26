<?php

namespace App\DTOs\ObjetiveExercise;

use App\Http\Requests\ObjetiveExercise\CreateObjetiveExerciseRequest;
use App\Http\Requests\ObjetiveExercise\UpdateObjetiveExerciseRequest;
use Illuminate\Support\Facades\Auth;

class DTOsObjetiveExercise
{
    public function __construct(
        private readonly ?string $name = null,
         private readonly ?int $exercise_id = null,
    ) {}

    public static function fromRequest(CreateObjetiveExerciseRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'],
            exercise_id: $validated['exercise_id'],
        );
    }

    public static function fromUpdateRequest(UpdateObjetiveExerciseRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'] ?? null,
            exercise_id: $validated['exercise_id'],
        );
    }

    public function toArray(): array
    {
        return [
        'name' => $this->name,
        'exercise_id' => $this->exercise_id,
        ];
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function getExerciseId(): ?int
    {
        return $this->exercise_id;
    }
    // Add getter methods for each property
    // public function getProperty1(): string
    // {
    //     return $this->property1;
    // }
}
