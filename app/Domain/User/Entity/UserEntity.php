<?php

namespace App\Domain\User\Entity;

use App\Domain\Shared\Entity\BaseEntity;

class UserEntity extends BaseEntity
{
    public function __construct(
        private readonly int $id,
        private string $name,
        private string $email
    ) { }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
        ];
    }
}
