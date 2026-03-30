<?php

namespace Modules\Auth\Interfaces\V1\Auth;

use Modules\Core\DTO\OtpDTO;
use Modules\Core\DTO\CodeDTO;
use Modules\Auth\DTO\V1\LoginDTO;
use Modules\Auth\DTO\V1\RegisterDTO;

interface AuthServiceInterface
{
    public function login(LoginDTO $DTO): array;
    public function register(RegisterDTO $DTO);
    public function refresh(): array;
    public function sendCode(CodeDTO $DTO);
    public function checkOTP(OtpDTO $DTO);
}
