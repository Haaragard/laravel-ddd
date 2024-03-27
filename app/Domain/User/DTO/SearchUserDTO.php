<?php

namespace App\Domain\User\DTO;

use App\Domain\Shared\DTO\BaseDTO;

class SearchUserDTO extends BaseDTO
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $email = null
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
