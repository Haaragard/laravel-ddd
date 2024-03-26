<?php

namespace App\Domain\User\Repository;

use App\Application\Exception\Shared\NotFoundException;
use App\Domain\Shared\DTO\BaseDTO;
use App\Domain\Shared\Entity\BaseEntity;
use App\Domain\Shared\Repository\BaseRepositoryInterface;
use App\Domain\User\DTO\SearchUserDTO;
use App\Domain\User\DTO\StoreUserDTO;
use App\Domain\User\Entity\UserEntity;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function store(BaseDTO|StoreUserDTO $dto): BaseEntity|UserEntity;

    /**
     * @throws NotFoundException
     */
    public function findBy(BaseDTO|SearchUserDTO $dto): BaseEntity|UserEntity;
}
