<?php

namespace App\DTOs\Profile;

use App\Http\Requests\Profile\CreateProfileRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class DTOsProfile
{
    public function __construct(
        public int $user_id,
        public ?string $phone = null,
        private readonly ?string $birthdate = null,
    ) {}

    public static function fromRequest(CreateProfileRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            user_id: Auth::id(),
            phone: $validated['phone'],
            birthdate: $validated['birthdate'],
        );
    }

    public static function fromUpdateRequest(UpdateProfileRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            user_id: Auth::id(),
            phone: $validated['phone'] ?? null,
            birthdate: $validated['birthdate'],
        );
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'phone' => $this->phone,
            'birthdate' => $this->birthdate,
        ];
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }
    public function getPhone(): ?string
    {
        return $this->phone;
    }
    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }
}
