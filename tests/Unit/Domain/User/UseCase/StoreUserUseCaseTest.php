<?php

namespace Tests\Unit\Domain\User\UseCase;

use App\Domain\User\DTO\StoreUserDTO;
use App\Domain\User\Entity\UserEntity;
use App\Domain\User\Service\UserService;
use App\Domain\User\UseCase\StoreUserUseCase;
use Tests\TestCase;

class StoreUserUseCaseTest extends TestCase
{
    private UserService $userService;
    private StoreUserUseCase $useCase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->createMock(UserService::class);
        $this->app->bind(UserService::class, fn () => $this->userService);

        $this->useCase = $this->app->make(StoreUserUseCase::class);
    }

    public function test_should_handle(): void
    {
        $dto = new StoreUserDTO('Name', 'test@test.com');

        $user = new UserEntity(1, 'Name', 'test@test.com');

        $this->userService->expects($this->once())
            ->method('store')
            ->with($dto)
            ->willReturn($user);

        $userCreatedArray = $this->useCase->handle($dto);

        $this->assertIsArray($userCreatedArray);
        $this->assertCount(3, $userCreatedArray);
        $this->assertEquals(1, $userCreatedArray['id']);
        $this->assertEquals('Name', $userCreatedArray['name']);
        $this->assertEquals('test@test.com', $userCreatedArray['email']);
    }
}
