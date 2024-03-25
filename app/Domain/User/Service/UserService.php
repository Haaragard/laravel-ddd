<?php

namespace App\Domain\User\Service;

use App\Domain\Shared\Service\BaseService;
use App\Domain\User\DTO\StoreUserDTO;
use App\Domain\User\Entity\UserEntity;
use App\Domain\User\Repository\UserRepositoryInterface;

class UserService extends BaseService
{
    public function __construct(
        private readonly UserRepositoryInterface $repository
    ) {}

    public function store(StoreUserDTO $dto): UserEntity
    {
        return $this->repository->store($dto);
    }
}
