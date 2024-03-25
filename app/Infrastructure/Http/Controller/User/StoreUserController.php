<?php

namespace App\Infrastructure\Http\Controller\User;

use App\Domain\User\DTO\StoreUserDTO;
use App\Domain\User\UseCase\StoreUserUseCase;
use App\Infrastructure\Http\Controller\Controller;
use App\Infrastructure\Http\Request\User\StoreUserRequest;
use App\Infrastructure\Http\Resource\User\StoreUserResponse;
use Illuminate\Http\JsonResponse;

class StoreUserController extends Controller
{
    public function __construct(private readonly StoreUserUseCase $useCase)
    {
    }

    public function __invoke(StoreUserRequest $request): JsonResponse
    {
        dd('aa');
        $createdUserData = $this->useCase->handle(
            new StoreUserDTO(
                $request->validated('name'),
                $request->validated('email')
            )
        );

        return response()->json(new StoreUserResponse($createdUserData), 201);
    }
}
