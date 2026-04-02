<?php

namespace Modules\Donation\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Resources\V1\UserResource;
use Modules\Institution\Resources\V1\BranchResource;

class DonationResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'sent_at' => $this->formatted_sent_at,
            'received_at' => $this->formatted_received_at,
            'notes' => $this->notes,

            'user_user' => new UserResource($this->whenLoaded('userUser')),
            'receiver_user' => new UserResource($this->whenLoaded('receiverUser')),

            'user_branch' => new BranchResource($this->whenLoaded('userBranch')),
            'receiver_branch' => new BranchResource($this->whenLoaded('receiverBranch')),

            'donation_items' => DonationResource::collection($this->whenLoaded('donationItems')),
        ];
    }
}
