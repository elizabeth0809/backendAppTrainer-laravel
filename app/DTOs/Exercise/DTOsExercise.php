<?php

namespace App\DTOs\Exercise;

use App\Http\Requests\Exercise\CreateExerciseRequest;
use App\Http\Requests\Exercise\UpdateExerciseRequest;
use Illuminate\Support\Facades\Auth;

class DTOsExercise
{
    public function __construct(
        private readonly ?string $name = null,
        private readonly ?int $price = null,
        private readonly ?string $modalities = null,
        private readonly ?string $img = null,
        private readonly ?int $objetive_exercise_id = null,
    ) {}

    public static function fromRequest(CreateExerciseRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'],
            price: $validated['price'],
            modalities: $validated['modalities'],
            img: $validated['img'] ?? null,
            objetive_exercise_id: $validated['objetive_exercise_id'],
        );
    }

    public static function fromUpdateRequest(UpdateExerciseRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'] ?? null,
            price: $validated['price'] ?? null,
            modalities: $validated['modalities'] ?? null,
            img: $validated['img'] ?? null,
            objetive_exercise_id: $validated['objetive_exercise_id'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'price' => $this->price,
            'img' => $this->img,
            'modalities' => $this->modalities,
            'objetive_exercise_id' => $this->objetive_exercise_id,
        ], fn($value) => !is_null($value));
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function getObjetiveExerciseId(): ?int
    {
        return $this->objetive_exercise_id;
    }
}
