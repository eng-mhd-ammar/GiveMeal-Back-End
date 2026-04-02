<?php

namespace Modules\Donation\Controllers\V1;

use Modules\Donation\DTO\V1\UnitDTO;
use Modules\Donation\Interfaces\V1\Unit\UnitServiceInterface;
use Modules\Donation\Requests\V1\Unit\CreateUnitRequest;
use Modules\Donation\Requests\V1\Unit\UpdateUnitRequest;
use Modules\Donation\Resources\V1\UnitResource;
use Modules\Core\Controllers\BaseController;
use Modules\Core\Utilities\Response;

class UnitController extends BaseController
{
    public function __construct(protected UnitServiceInterface $modelService)
    {
    }

    public function index()
    {
        $models = $this->modelService->index();
        return (new Response(UnitResource::collection($models)->resource))->success(message: "All units.");
    }

    public function show(string $modelId)
    {
        $model = $this->modelService->show($modelId);
        return (new Response(UnitResource::make($model)))->success(message: "Unit details.");
    }

    public function create(CreateUnitRequest $request)
    {
        $this->modelService->create(UnitDTO::fromRequest($request));
        return (new Response())->success(message: "Unit created successfully.", code: Response::HTTP_CREATED);
    }

    public function update(UpdateUnitRequest $request, string $modelId)
    {
        $this->modelService->update($modelId, UnitDTO::fromRequest($request));
        return (new Response())->success(message: "Unit updated successfully.");
    }

    public function delete(string $modelId)
    {
        $this->modelService->delete($modelId);
        return (new Response())->success(message: "Unit deleted successfully.");
    }

    public function ForceDelete(string $modelId)
    {
        $this->modelService->ForceDelete($modelId);
        return (new Response())->success(message: "Unit force deleted successfully.");
    }

    public function restore(string $modelId)
    {
        $this->modelService->restore($modelId);
        return (new Response())->success(message: "Unit restored successfully.");
    }
}
