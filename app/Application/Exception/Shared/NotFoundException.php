<?php

namespace App\Application\Exception\Shared;

use Exception;
use Throwable;

class NotFoundException extends Exception
{
    public function __construct(
        string $message = 'Register not found',
        int $code = 404,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
