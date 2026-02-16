<?php

namespace App\DTOs\Auth;

use App\Http\Requests\Auth\RegisterRequest;

class DTOsRegister
{
    public function __construct(
        private readonly string $name,
        private readonly string $email,
        private readonly string $password,
        private readonly string $role,
    ) {}

    public static function fromRequest(RegisterRequest $request): self
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            password: $request->validated('password'),
            role: $request->validated('role') ?? 'customer'
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getRoleList(): array
    {
        return ['customer', 'admin'];
    }

    public function isValidRole(string $role): bool
    {
        return in_array($role, $this->getRoleList());
    }

    public function isValid(): bool
    {
        return $this->isValidRole($this->role);
    }
}
