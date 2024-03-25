<?php

return [
    \App\Domain\User\Repository\UserRepositoryInterface::class => \App\Infrastructure\Database\Eloquent\Repository\UserRepository::class,
];
