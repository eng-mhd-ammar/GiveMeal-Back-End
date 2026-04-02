<?php

namespace Modules\Address\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Resources\V1\UserResource;
use Modules\Donation\Resources\V1\DonationResource;
use Modules\Institution\Resources\V1\BranchResource;

class DonationItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'notes' => $this->notes,

            'unit' => new UnitResource($this->whenLoaded('unit')),
            'donation' => new DonationResource($this->whenLoaded('donation')),
        ];
    }
}
