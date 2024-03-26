<?php

namespace Tests\Unit\Domain\User\Entity;

use App\Domain\User\Entity\UserEntity;
use Tests\TestCase;

class UserEntityTest extends TestCase
{
    public function test_should_instantiate(): void
    {
        $user = new UserEntity(
            id: 1,
            name: 'Name',
            email: 'test@test.com'
        );

        $this->assertInstanceOf(UserEntity::class, $user);
    }

    public function test_should_get_id(): void
    {
        $user = new UserEntity(
            id: 1,
            name: 'Name',
            email: 'test@test.com'
        );

        $this->assertIsInt($user->getId());
        $this->assertEquals(1, $user->getId());
    }

    public function test_should_get_name(): void
    {
        $user = new UserEntity(
            id: 1,
            name: 'Name',
            email: 'test@test.com'
        );

        $this->assertIsString($user->getName());
        $this->assertEquals('Name', $user->getName());
    }

    public function test_should_set_name(): void
    {
        $user = new UserEntity(
            id: 1,
            name: 'Name',
            email: 'test@test.com'
        );

        $this->assertIsString($user->getName());
        $this->assertEquals('Name', $user->getName());

        $user->setName('Name Changed');

        $this->assertIsString($user->getName());
        $this->assertEquals('Name Changed', $user->getName());
    }

    public function test_should_get_email(): void
    {
        $user = new UserEntity(
            id: 1,
            name: 'Name',
            email: 'test@test.com'
        );

        $this->assertIsString($user->getName());
        $this->assertEquals('Name', $user->getName());
    }

    public function test_should_set_email(): void
    {
        $user = new UserEntity(
            id: 1,
            name: 'Name',
            email: 'test@test.com'
        );

        $this->assertIsString($user->getEmail());
        $this->assertEquals('test@test.com', $user->getEmail());

        $user->setEmail('test_email_changed@test.com');

        $this->assertIsString($user->getEmail());
        $this->assertEquals('test_email_changed@test.com', $user->getEmail());
    }

    public function test_should_to_array(): void
    {
        $user = new UserEntity(
            id: 1,
            name: 'Name',
            email: 'test@test.com'
        );

        $userArray = $user->toArray();

        $this->assertIsArray($userArray);
        $this->assertCount(3, $userArray);

        $this->assertArrayHasKey('id', $userArray);
        $this->assertIsInt($userArray['id']);
        $this->assertEquals(1, $userArray['id']);

        $this->assertArrayHasKey('name', $userArray);
        $this->assertIsString($userArray['name']);
        $this->assertEquals('Name', $userArray['name']);

        $this->assertArrayHasKey('email', $userArray);
        $this->assertIsString($userArray['email']);
        $this->assertEquals('test@test.com', $userArray['email']);
    }
}
