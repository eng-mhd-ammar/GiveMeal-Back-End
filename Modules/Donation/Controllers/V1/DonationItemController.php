<?php

namespace Modules\Donation\Controllers\V1;

use Modules\Donation\DTO\V1\DonationItemDTO;
use Modules\Donation\Interfaces\V1\DonationItem\DonationItemServiceInterface;
use Modules\Donation\Requests\V1\DonationItem\CreateDonationItemRequest;
use Modules\Donation\Requests\V1\DonationItem\UpdateDonationItemRequest;
use Modules\Donation\Resources\V1\DonationItemResource;
use Modules\Core\Controllers\BaseController;
use Modules\Core\Utilities\Response;

class DonationItemController extends BaseController
{
    public function __construct(protected DonationItemServiceInterface $modelService)
    {
    }

    public function index()
    {
        $models = $this->modelService->index();
        return (new Response(DonationItemResource::collection($models)->resource))->success(message: "All donation items.");
    }

    public function show(string $modelId)
    {
        $model = $this->modelService->show($modelId);
        return (new Response(DonationItemResource::make($model)))->success(message: "Donation item details.");
    }

    public function create(CreateDonationItemRequest $request)
    {
        $this->modelService->create(DonationItemDTO::fromRequest($request));
        return (new Response())->success(message: "Donation item created successfully.", code: Response::HTTP_CREATED);
    }

    public function update(UpdateDonationItemRequest $request, string $modelId)
    {
        $this->modelService->update($modelId, DonationItemDTO::fromRequest($request));
        return (new Response())->success(message: "Donation item updated successfully.");
    }

    public function delete(string $modelId)
    {
        $this->modelService->delete($modelId);
        return (new Response())->success(message: "Donation item deleted successfully.");
    }

    public function ForceDelete(string $modelId)
    {
        $this->modelService->ForceDelete($modelId);
        return (new Response())->success(message: "Donation item force deleted successfully.");
    }

    public function restore(string $modelId)
    {
        $this->modelService->restore($modelId);
        return (new Response())->success(message: "Donation item restored successfully.");
    }
}
