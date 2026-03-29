<?php

namespace Modules\Auth\Controllers\V1;

use Modules\Core\Utilities\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\DTO\V1\ProfileDTO;
use Modules\Auth\Interfaces\V1\Profile\ProfileServiceInterface;
use Modules\Auth\Requests\V1\Profile\UpdateProfileRequest;
use Modules\Auth\Resources\V1\ProfileResource;
use Modules\Core\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function __construct(protected ProfileServiceInterface $profileService) {}

    public function show()
    {
        $user = $this->profileService->show(Auth::guard('api')->id());
        return (new Response(ProfileResource::make($user)))->success(message: "Profile Details");
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = $this->profileService->update(Auth::guard('api')->id(), ProfileDTO::fromRequest($request));
        return (new Response(ProfileResource::make($user)))->success(message: "Profile updated successfully.");
    }

    public function delete()
    {
        $this->profileService->delete(Auth::guard('api')->id());
        return (new Response())->success(message: "Profile deleted successfully.");
    }
}
