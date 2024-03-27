<?php

namespace Tests\Unit\Infrastructure\Http\Controller\User;

use App\Domain\User\DTO\SearchUserDTO;
use App\Domain\User\Entity\UserEntity;
use App\Domain\User\UseCase\SearchUserUseCase;
use App\Infrastructure\Http\Controller\User\SearchUserController;
use App\Infrastructure\Http\Request\User\SearchUserRequest;
use Tests\TestCase;

class SearchUserControllerTest extends TestCase
{
    private SearchUserUseCase $searchUserUseCase;
    private SearchUserRequest $searchUserRequest;
    private SearchUserController $searchUserController;

    protected function setUp(): void
    {
        parent::setUp();

        $this->searchUserUseCase = $this->createMock(SearchUserUseCase::class);
        $this->app->bind(SearchUserUseCase::class, fn () => $this->searchUserUseCase);

        $this->searchUserRequest = $this->createMock(SearchUserRequest::class);
        $this->app->bind(SearchUserRequest::class, fn () => $this->searchUserRequest);

        $this->searchUserController = $this->app->make(SearchUserController::class);
    }

    public function test_should_invoke(): void
    {
        $user = new UserEntity(1, 'Name', 'test@test.com');

        $dto = new SearchUserDTO(
            $user->getId(),
            $user->getName(),
            $user->getEmail()
        );

        $this->searchUserRequest->expects($this->exactly(3))
            ->method('validated')
            ->willReturnOnConsecutiveCalls(
                $user->getId(),
                $user->getName(),
                $user->getEmail()
            );

        $this->searchUserUseCase->expects($this->once())
            ->method('handle')
            ->with($dto)
            ->willReturn($user->toArray());

        $this->searchUserController->__invoke($this->searchUserRequest);
    }
}
