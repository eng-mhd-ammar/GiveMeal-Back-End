<?php

namespace Modules\Address\Controllers\V1;

use Modules\Address\DTO\V1\StateDTO;
use Modules\Address\Interfaces\V1\State\StateServiceInterface;
use Modules\Address\Requests\V1\State\CreateStateRequest;
use Modules\Address\Requests\V1\State\UpdateStateRequest;
use Modules\Address\Resources\V1\StateResource;
use Modules\Core\Controllers\BaseController;
use Modules\Core\Utilities\Response;

class StateController extends BaseController
{
    public function __construct(protected StateServiceInterface $modelService)
    {
    }

    public function index()
    {
        $models = $this->modelService->index();
        return (new Response(StateResource::collection($models)->resource))->success(message: "All states.");
    }

    public function show(string $modelId)
    {
        $model = $this->modelService->show($modelId);
        return (new Response(StateResource::make($model)))->success(message: "State details.");
    }

    public function create(CreateStateRequest $request)
    {
        $this->modelService->create(StateDTO::fromRequest($request));
        return (new Response())->success(message: "State created successfully.", code: Response::HTTP_CREATED);
    }

    public function update(UpdateStateRequest $request, string $modelId)
    {
        $this->modelService->update($modelId, StateDTO::fromRequest($request));
        return (new Response())->success(message: "State updated successfully.");
    }

    public function delete(string $modelId)
    {
        $this->modelService->delete($modelId);
        return (new Response())->success(message: "State deleted successfully.");
    }

    public function ForceDelete(string $modelId)
    {
        $this->modelService->ForceDelete($modelId);
        return (new Response())->success(message: "State force deleted successfully.");
    }

    public function restore(string $modelId)
    {
        $this->modelService->restore($modelId);
        return (new Response())->success(message: "State restored successfully.");
    }
}
