<?php

namespace App\Domain\User\UseCase;

use App\Domain\User\DTO\SearchUserDTO;
use App\Domain\User\Service\UserService;

class SearchUserUseCase
{
    public function __construct(
        private readonly UserService $service
    ) {}

    public function handle(SearchUserDTO $dto): array
    {
        $user = $this->service->search($dto);

        return $user->toArray();
    }
}
