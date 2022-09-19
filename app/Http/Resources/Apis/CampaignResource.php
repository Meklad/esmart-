<?php

namespace App\Http\Resources\Apis;

use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "from" => $this->from,
            "to" => $this->to,
            "total" => $this->total,
            "daily_budget" => $this->daily_budget
        ];
    }
}
