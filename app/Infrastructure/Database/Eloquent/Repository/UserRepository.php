<?php

namespace App\Infrastructure\Database\Eloquent\Repository;

use App\Application\Exception\Shared\NotFoundException;
use App\Domain\Shared\DTO\BaseDTO;
use App\Domain\Shared\Entity\BaseEntity;
use App\Domain\User\DTO\SearchUserDTO;
use App\Domain\User\DTO\StoreUserDTO;
use App\Domain\User\Entity\UserEntity;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Infrastructure\Database\Eloquent\Models\UserModel;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function store(BaseDTO|StoreUserDTO $dto): BaseEntity|UserEntity
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

    /**
     * @throws NotFoundException
     */
    public function findBy(BaseDTO|SearchUserDTO $dto): BaseEntity|UserEntity
    {
        $userQuery = UserModel::query();

        $userQuery->when(
            ! is_null($dto->id),
            fn (Builder $builder) =>
                $builder->where('id', $dto->id)
        );

        $userQuery->when(
            ! is_null($dto->name),
            fn (Builder $builder) =>
                $builder->where('name', 'like', "%{$dto->name}%")
        );

        $userQuery->when(
            ! is_null($dto->email),
            fn (Builder $builder) =>
                $builder->where('email', 'like', "%{$dto->email}%")
        );

        try {
            $userModel = $userQuery->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            throw new NotFoundException(previous: $exception);
        }

        return new UserEntity(
            $userModel['id'],
            $userModel['name'],
            $userModel['email']
        );
    }
}
