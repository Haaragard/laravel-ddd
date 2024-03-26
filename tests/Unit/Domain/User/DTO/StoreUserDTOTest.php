<?php

namespace Tests\Unit\Domain\User\DTO;

use App\Domain\User\DTO\StoreUserDTO;
use Tests\TestCase;

class StoreUserDTOTest extends TestCase
{
    public function test_should_instantiate(): void
    {
        $dto = new StoreUserDTO('name', 'test@test.com');

        $this->assertInstanceOf(StoreUserDTO::class, $dto);

        $this->assertIsString($dto->name);
        $this->assertEquals('name', $dto->name);

        $this->assertIsString($dto->email);
        $this->assertEquals('test@test.com', $dto->email);
    }
}
