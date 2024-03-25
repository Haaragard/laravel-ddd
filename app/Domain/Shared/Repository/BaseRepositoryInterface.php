<?php

namespace App\Domain\Shared\Repository;

use App\Domain\Shared\DTO\BaseDTO;
use App\Domain\Shared\Entity\BaseEntity;

interface BaseRepositoryInterface
{
    public function store(BaseDTO $dto): BaseEntity;
}
