<?php

namespace App\Domain\User\DTO;

use App\Domain\Shared\DTO\BaseDTO;

class StoreUserDTO extends BaseDTO
{
    public function __construct(
        public string $name,
        public string $email
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
