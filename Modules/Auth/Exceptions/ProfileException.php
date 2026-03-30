<?php

namespace Modules\Auth\Exceptions;

use Modules\Core\Exceptions\BaseException;
use Modules\Core\Utilities\Response;

class ProfileException extends BaseException
{
    public static function userNotFound(): void
    {
        throw new self('User not found.', Response::HTTP_NOT_FOUND);
    }
    public static function alreadyPhoneTaken(): void
    {
        throw new self('This phone has been already taken', Response::HTTP_FORBIDDEN);
    }
}
