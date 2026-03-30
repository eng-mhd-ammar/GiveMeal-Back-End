<?php

namespace Modules\Core\Exceptions;

use Modules\Core\Utilities\Response;

class AuthException extends BaseException
{
    public static function invalidCredentials(): void
    {
        throw new self('Invalid Credentials Provided', Response::HTTP_NOT_FOUND);
    }
    public static function accountHasBeenDeactivated(): void
    {
        throw new self('Account Has Been Deactivated, Please Contact Support', Response::HTTP_FORBIDDEN);
    }
    public static function invalidRefreshToken(): void
    {
        throw new self('Invalid Refresh Token Provided', Response::HTTP_FORBIDDEN);
    }
    public static function unverifiedAccount(): void
    {
        throw new self('Account Has Not Been Verified Yet, Please Verify Your Account First.', Response::HTTP_FORBIDDEN);
    }
    public static function unverifiedPhoneAccount(): void
    {
        throw new self('Account\'s phone Has Not Been Verified Yet, Please Verify Your Account First.', Response::HTTP_FORBIDDEN);
    }
    public static function unverifiedMailAccount(): void
    {
        throw new self('Account\'s email Has Not Been Verified Yet, Please Verify Your Account First.', Response::HTTP_FORBIDDEN);
    }
    public static function invalidOtpProvided(): void
    {
        throw new self('Wrong OTP Provided, Please Try Again.', Response::HTTP_BAD_REQUEST);
    }
    public static function otpTimeout(): void
    {
        throw new self('Otp could be expired, please request a new one', Response::HTTP_BAD_REQUEST);
    }
    public static function invalidOldPassword(): void
    {
        throw new self('Invalid Old Password', Response::HTTP_BAD_REQUEST);
    }
    public static function invalidNewPassword(): void
    {
        throw new self('New Password Must Be Different From Old Password', Response::HTTP_BAD_REQUEST);
    }
    public static function invalidTokenProvided(): void
    {
        throw new self('Invalid Token Type Provided', Response::HTTP_NOT_FOUND);
    }
    public static function notAnAdmin(): void
    {
        throw new self('Sorry You are not an admin.', Response::HTTP_BAD_REQUEST);
    }
}
