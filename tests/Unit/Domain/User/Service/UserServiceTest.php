<?php

namespace Tests\Unit\Domain\User\Service;

use App\Domain\User\DTO\SearchUserDTO;
use App\Domain\User\DTO\StoreUserDTO;
use App\Domain\User\Entity\UserEntity;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\Service\UserService;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserRepositoryInterface $userRepository;
    private UserService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->app->bind(UserRepositoryInterface::class, fn () => $this->userRepository);

        $this->service = $this->app->make(UserService::class);
    }

    public function test_should_store(): void
    {
        $dto = new StoreUserDTO('Name', 'test@test.com');

        $user = new UserEntity(1, $dto->name, $dto->name);

        $this->userRepository->expects($this->once())
            ->method('store')
            ->willReturn($user);

        $this->service->store($dto);
    }

    /**
     * @dataProvider searchUserDTODataProvider
     */
    public function test_should_search(
        ?int $id = null,
        ?string $name = null,
        ?string $email = null
    ): void {
        $dto = new SearchUserDTO($id, $name, $email);

        $this->userRepository->expects($this->once())
            ->method('findBy')
            ->with($dto)
            ->willReturn(
                new UserEntity(1, 'Name', 'test@test.com')
            );

        $user = $this->service->search($dto);

        $this->assertInstanceOf(UserEntity::class, $user);
    }

    public static function searchUserDTODataProvider(): array
    {
        return [
            [1, null, null],
            [null, 'Name', null],
            [null, null, 'test@test.com'],
            [1, null, null],
            [1, null, null],
        ];
    }
}
