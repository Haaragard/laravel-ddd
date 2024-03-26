<?php

namespace Tests\Unit\Domain\User\DTO;

use App\Domain\User\DTO\SearchUserDTO;
use Tests\TestCase;

class SearchUserDTOTest extends TestCase
{
    public function test_should_instantiate(): void
    {
        $dto = new SearchUserDTO(1, 'name', 'test@test.com');

        $this->assertInstanceOf(SearchUserDTO::class, $dto);

        $this->assertIsInt($dto->id);
        $this->assertEquals(1, $dto->id);

        $this->assertIsString($dto->name);
        $this->assertEquals('name', $dto->name);

        $this->assertIsString($dto->email);
        $this->assertEquals('test@test.com', $dto->email);
    }
}
