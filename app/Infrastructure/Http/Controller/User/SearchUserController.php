<?php

namespace App\Infrastructure\Http\Controller\User;

use App\Domain\User\DTO\SearchUserDTO;
use App\Domain\User\UseCase\SearchUserUseCase;
use App\Infrastructure\Http\Controller\Controller;
use App\Infrastructure\Http\Request\User\SearchUserRequest;
use App\Infrastructure\Http\Resource\User\StoreUserResponse;
use Illuminate\Http\JsonResponse;

class SearchUserController extends Controller
{
    public function __construct(private readonly SearchUserUseCase $useCase)
    {
    }

    public function __invoke(SearchUserRequest $request): JsonResponse
    {
        $createdUserData = $this->useCase->handle(
            new SearchUserDTO(
                $request->validated('id'),
                $request->validated('name'),
                $request->validated('email')
            )
        );

        return response()->json(new StoreUserResponse($createdUserData), 201);
    }
}
