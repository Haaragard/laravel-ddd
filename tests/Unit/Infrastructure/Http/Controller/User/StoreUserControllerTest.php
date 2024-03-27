<?php

namespace Tests\Unit\Infrastructure\Http\Controller\User;

use App\Domain\User\DTO\StoreUserDTO;
use App\Domain\User\Entity\UserEntity;
use App\Domain\User\UseCase\StoreUserUseCase;
use App\Infrastructure\Http\Controller\User\StoreUserController;
use App\Infrastructure\Http\Request\User\StoreUserRequest;
use Tests\TestCase;

class StoreUserControllerTest extends TestCase
{
    private StoreUserUseCase $storeUserUseCase;
    private StoreUserRequest $storeUserRequest;
    private StoreUserController $storeUserController;

    protected function setUp(): void
    {
        parent::setUp();

        $this->storeUserUseCase = $this->createMock(StoreUserUseCase::class);
        $this->app->bind(StoreUserUseCase::class, fn () => $this->storeUserUseCase);

        $this->storeUserRequest = $this->createMock(StoreUserRequest::class);
        $this->app->bind(StoreUserRequest::class, fn () => $this->storeUserRequest);

        $this->storeUserController = $this->app->make(StoreUserController::class);
    }

    public function test_should_invoke(): void
    {
        $user = new UserEntity(1, 'Name', 'test@test.com');

        $dto = new StoreUserDTO(
            $user->getName(),
            $user->getEmail()
        );

        $this->storeUserRequest->expects($this->exactly(2))
            ->method('validated')
            ->willReturnOnConsecutiveCalls(
                $user->getName(),
                $user->getEmail()
            );

        $this->storeUserUseCase->expects($this->once())
            ->method('handle')
            ->with($dto)
            ->willReturn($user->toArray());

        $this->storeUserController->__invoke($this->storeUserRequest);
    }
}
