<?php

namespace Modules\Institution\Controllers\V1;

use Modules\Institution\DTO\V1\UserBranchDTO;
use Modules\Institution\Interfaces\V1\UserBranch\UserBranchServiceInterface;
use Modules\Institution\Requests\V1\UserBranch\CreateUserBranchRequest;
use Modules\Institution\Requests\V1\UserBranch\UpdateUserBranchRequest;
use Modules\Institution\Resources\V1\UserBranchResource;
use Modules\Core\Controllers\BaseController;
use Modules\Core\Utilities\Response;

class UserBranchController extends BaseController
{
    public function __construct(protected UserBranchServiceInterface $modelService)
    {
    }

    public function index()
    {
        $models = $this->modelService->index();
        return (new Response(UserBranchResource::collection($models)->resource))->success(message: "All user branches.");
    }

    public function show(string $modelId)
    {
        $model = $this->modelService->show($modelId);
        return (new Response(UserBranchResource::make($model)))->success(message: "User branch details.");
    }

    public function create(CreateUserBranchRequest $request)
    {
        $this->modelService->create(UserBranchDTO::fromRequest($request));
        return (new Response())->success(message: "User branch created successfully.", code: Response::HTTP_CREATED);
    }

    public function update(UpdateUserBranchRequest $request, string $modelId)
    {
        $this->modelService->update($modelId, UserBranchDTO::fromRequest($request));
        return (new Response())->success(message: "User branch updated successfully.");
    }

    public function delete(string $modelId)
    {
        $this->modelService->delete($modelId);
        return (new Response())->success(message: "User branch deleted successfully.");
    }

    public function ForceDelete(string $modelId)
    {
        $this->modelService->ForceDelete($modelId);
        return (new Response())->success(message: "User branch force deleted successfully.");
    }

    public function restore(string $modelId)
    {
        $this->modelService->restore($modelId);
        return (new Response())->success(message: "User branch restored successfully.");
    }
}
