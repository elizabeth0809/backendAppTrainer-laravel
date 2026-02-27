<?php

namespace App\DTOs\ObjetiveExercise;

use App\Http\Requests\ObjetiveExercise\CreateObjetiveExerciseRequest;
use App\Http\Requests\ObjetiveExercise\UpdateObjetiveExerciseRequest;
use Illuminate\Support\Facades\Auth;

class DTOsObjetiveExercise
{
    public function __construct(
        private readonly ?string $name = null,
    ) {}

    public static function fromRequest(CreateObjetiveExerciseRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'],
        );
    }

    public static function fromUpdateRequest(UpdateObjetiveExerciseRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
        ], fn($value) => !is_null($value));
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
