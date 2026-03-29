<?php

namespace Modules\Auth\Services\V1;

use Modules\Auth\Interfaces\V1\Profile\ProfileRepositoryInterface;
use Modules\Auth\Interfaces\V1\Profile\ProfileServiceInterface;
use Modules\Auth\Exceptions\ProfileException;
use Modules\Core\Services\BaseService;

class ProfileService extends BaseService implements ProfileServiceInterface
{
    public function __construct(protected ProfileRepositoryInterface $repository)
    {
    }

    // public function phoneUpdateRequest($model_id, $DTO)
    // {
    //     $model = $this->repository->firstWhere('phone', $DTO->new_phone);
    //     if ($model) {
    //         $this->throwAlreadyPhoneTaken();
    //     }

    //     $this->repository = $this->repository->resetQuery();

    //     $data = [
    //         'new_phone' => $DTO->new_phone,
    //         'new_phone_code' => '123456' ,//rand(100000, 999999),
    //         'new_phone_code_expired_at' => now()->addMinutes(10)
    //     ];
    //     $model = $this->repository->update($model_id, $data);
    //     return $model;
    // }

    // public function phoneUpdateSendOtp($DTO)
    // {
    //     $model = $this->repository->firstWhere('new_phone', $DTO->new_phone);
    //     $code = '123456' /*rand(100000, 999999)*/;
    //     $model = $model->update(['new_phone_code' => $code, 'new_phone_code_expired_at' => now()->addMinutes(10)]);
    // }

    // public function phoneUpdateCheckOtp($DTO)
    // {
    //     $model = $this->repository->firstWhere('phone', $DTO->new_phone);
    //     if ($model) {
    //         $this->throwAlreadyPhoneTaken();
    //     }

    //     $this->repository = $this->repository->resetQuery();

    //     $model = $this->repository->firstWhere('new_phone', $DTO->new_phone);
    //     if (!$model) {
    //         $this->throwUserNotFound();
    //     }

    //     if ($model->new_phone_code != $DTO->new_phone_code) {
    //         $this->throwInvalidOtp();
    //     }

    //     $this->repository->update($model->id, ['phone' => $DTO->new_phone, 'new_phone' => null]);

    //     return $model;
    // }

    public function throwUserNotFound()
    {
        ProfileException::userNotFound();
    }

    public function throwAlreadyPhoneTaken()
    {
        ProfileException::alreadyPhoneTaken();
    }
}
