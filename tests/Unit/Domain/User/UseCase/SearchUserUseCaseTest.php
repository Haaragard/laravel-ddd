<?php

namespace Tests\Unit\Domain\User\UseCase;

use App\Domain\User\DTO\SearchUserDTO;
use App\Domain\User\Entity\UserEntity;
use App\Domain\User\Service\UserService;
use App\Domain\User\UseCase\SearchUserUseCase;
use Tests\TestCase;

class SearchUserUseCaseTest extends TestCase
{
    private UserService $userService;
    private SearchUserUseCase $useCase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->createMock(UserService::class);
        $this->app->bind(UserService::class, fn () => $this->userService);

        $this->useCase = $this->app->make(SearchUserUseCase::class);
    }

    public function test_should_handle(): void
    {
        $user = new UserEntity(1, 'Name', 'test@test.com');

        $dto = new SearchUserDTO(1, 'Name', 'test@test.com');

        $this->userService->expects($this->once())
            ->method('search')
            ->with($dto)
            ->willReturn($user);

        $userFoundArray = $this->useCase->handle($dto);

        $this->assertIsArray($userFoundArray);
        $this->assertCount(3, $userFoundArray);
        $this->assertEquals(1, $userFoundArray['id']);
        $this->assertEquals('Name', $userFoundArray['name']);
        $this->assertEquals('test@test.com', $userFoundArray['email']);
    }
}
