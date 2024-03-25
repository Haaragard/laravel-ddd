<?php

namespace App\Domain\Shared\Entity;

use App\Application\Contracts\Arrayable;

abstract class BaseEntity implements Arrayable
{
    public function toArray(): array
    {
        return [];
    }
}
