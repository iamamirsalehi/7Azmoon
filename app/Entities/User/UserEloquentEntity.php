<?php

namespace App\Entities\User;

use App\Models\User;

class UserEloquentEntity implements UserEntity
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getId(): int
    {
        return $this->user->id;
    }

    public function getFullName(): string
    {
        return $this->user->full_name;
    }

    public function getEmail(): string
    {
        return $this->user->email;
    }

    public function getMobile(): string
    {
        return $this->user->mobile;
    }

    public function getPassword(): string
    {
        return $this->user->password;
    }
}
