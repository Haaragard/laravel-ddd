<?php

namespace App\Domain\User\UseCase;

use App\Domain\User\DTO\StoreUserDTO;
use App\Domain\User\Service\UserService;

class StoreUserUseCase
{
    public function __construct(
        private readonly UserService $service
    ) {}

    public function handle(StoreUserDTO $dto): array
    {
        $user = $this->service->store($dto);

        return $user->toArray();
    }
}
