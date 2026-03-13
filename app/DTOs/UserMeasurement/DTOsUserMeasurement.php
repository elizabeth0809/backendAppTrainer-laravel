<?php

namespace App\DTOs\UserMeasurement;

use App\Http\Requests\UserMeasurement\CreateUserMeasurementRequest;
use App\Http\Requests\UserMeasurement\UpdateUserMeasurementRequest;
use Illuminate\Support\Facades\Auth;

class DTOsUserMeasurement
{
    public function __construct(
    private readonly ?int $user_id,
    private readonly ?float $weight = null,
    private readonly ?float $height = null,
    private readonly ?string $gender = null,
    private readonly ?string $level = null,
    ) {}

    public static function fromRequest(CreateUserMeasurementRequest $request): self
    {
        $validated = $request->validated();

        return new self(
         user_id: Auth::id(),
        weight: $validated['weight'],
        height: $validated['height'],
        gender: $validated['gender'],
        level: $validated['level'],
);
    }

    public static function fromUpdateRequest(UpdateUserMeasurementRequest $request): self
    {
        $validated = $request->validated();

        return new self(
             user_id: Auth::id(),
            weight: $validated['weight'] ?? null,
            height: $validated['height'],
            gender: $validated['gender'],
            level: $validated['level'],
        );
    }

    public function toArray(): array
    {
        return [
        'user_id' => $this->user_id,
        'weight' => $this->weight,
        'height' => $this->height,
        'gender' => $this->gender,
        'level' => $this->level,
        ];

    }
public function getUserId(): int
{
        return $this->user_id;
}
public function getWeight(): ?float
{
    return $this->weight;
}

public function getHeight(): ?float
{
    return $this->height;
}

public function getGender(): ?string
{
    return $this->gender;
}

public function getLevel(): ?string
{
    return $this->level;
}

}
