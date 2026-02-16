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
    ) {}

    public static function fromRequest(CreateExerciseRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'],
            price: $validated['price'],
            modalities: $validated['modalities'],
            img: $validated['img'] ?? null,
        );
    }

    public static function fromUpdateRequest(UpdateExerciseRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'] ?? null,
            price: $validated['price'] ?? null,
            modalities: $validated['modalities'],
            img: $validated['img'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
           'name' => $this->name,
            'price' => $this->price,
            'img' => $this->img,
            'modalities' => $this->modalities,
        ];
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
}
