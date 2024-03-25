<?php

namespace App\Infrastructure\Database\Eloquent\Repository;

use App\Domain\Shared\DTO\BaseDTO;
use App\Domain\Shared\Entity\BaseEntity;
use App\Domain\User\DTO\StoreUserDTO;
use App\Domain\User\Entity\UserEntity;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Infrastructure\Database\Eloquent\Models\UserModel;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function store(StoreUserDTO|BaseDTO $dto): BaseEntity|UserEntity
    {
        $userModel = new UserModel();
        $userModel->fill($dto->toArray());
        $userModel->saveOrFail();

        return new UserEntity(
            $userModel['id'],
            $userModel['name'],
            $userModel['email']
        );
    }
}
