<?php

namespace Modules\Institution\Controllers\V1;

use Modules\Institution\DTO\V1\UserInstitutionDTO;
use Modules\Institution\Interfaces\V1\UserInstitution\UserInstitutionServiceInterface;
use Modules\Institution\Requests\V1\UserInstitution\CreateUserInstitutionRequest;
use Modules\Institution\Requests\V1\UserInstitution\UpdateUserInstitutionRequest;
use Modules\Institution\Resources\V1\UserInstitutionResource;
use Modules\Core\Controllers\BaseController;
use Modules\Core\Utilities\Response;

class UserInstitutionController extends BaseController
{
    public function __construct(protected UserInstitutionServiceInterface $modelService)
    {
    }

    public function index()
    {
        $models = $this->modelService->index();
        return (new Response(UserInstitutionResource::collection($models)->resource))->success(message: "All user institutions.");
    }

    public function show(string $modelId)
    {
        $model = $this->modelService->show($modelId);
        return (new Response(UserInstitutionResource::make($model)))->success(message: "User institution details.");
    }

    public function create(CreateUserInstitutionRequest $request)
    {
        $this->modelService->create(UserInstitutionDTO::fromRequest($request));
        return (new Response())->success(message: "User institution created successfully.", code: Response::HTTP_CREATED);
    }

    public function update(UpdateUserInstitutionRequest $request, string $modelId)
    {
        $this->modelService->update($modelId, UserInstitutionDTO::fromRequest($request));
        return (new Response())->success(message: "User institution updated successfully.");
    }

    public function delete(string $modelId)
    {
        $this->modelService->delete($modelId);
        return (new Response())->success(message: "User institution deleted successfully.");
    }

    public function ForceDelete(string $modelId)
    {
        $this->modelService->ForceDelete($modelId);
        return (new Response())->success(message: "User institution force deleted successfully.");
    }

    public function restore(string $modelId)
    {
        $this->modelService->restore($modelId);
        return (new Response())->success(message: "User institution restored successfully.");
    }
}
