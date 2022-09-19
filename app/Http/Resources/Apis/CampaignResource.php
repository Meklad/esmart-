<?php

namespace App\Http\Resources\Apis;

use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "from" => $this->from,
            "to" => $this->to,
            "total" => $this->total,
            "daily_budget" => $this->daily_budget
        ];
    }
}
