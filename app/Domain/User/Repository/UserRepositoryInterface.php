<?php

namespace App\Domain\User\Repository;

use App\Domain\Shared\DTO\BaseDTO;
use App\Domain\Shared\Entity\BaseEntity;
use App\Domain\Shared\Repository\BaseRepositoryInterface;
use App\Domain\User\DTO\StoreUserDTO;
use App\Domain\User\Entity\UserEntity;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function store(BaseDTO|StoreUserDTO $dto): BaseEntity|UserEntity;
}
