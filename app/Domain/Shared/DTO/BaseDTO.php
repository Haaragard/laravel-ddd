<?php

namespace App\Domain\Shared\DTO;

use App\Application\Contracts\Arrayable;
use JsonSerializable;

abstract class BaseDTO implements Arrayable, JsonSerializable
{
    public function toArray(): array
    {
        return [];
    }

    final public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
