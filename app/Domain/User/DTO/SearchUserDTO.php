<?php

namespace App\Domain\User\DTO;

use App\Domain\Shared\DTO\BaseDTO;

class SearchUserDTO extends BaseDTO
{
    public function __construct(
        public ?int $id,
        public ?string $name,
        public ?string $email
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
