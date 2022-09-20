<?php

namespace App\Http\Resources\Apis;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
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
            "file_name" => $this->file_name,
            "mime_type" => $this->mime_type,
            "url" => $this->original_url
        ];
    }
}
