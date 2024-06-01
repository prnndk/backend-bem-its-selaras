<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
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
            'name' => $this->user->name,
            'instagram' => $this->instagram,
            'linkedin' => $this->linkedin,
            'image' => $this->image,
            'jabatan' => $this->jabatan->name,
            'kedirjenan' => $this->whenNotNull(KedirjenanResource::make($this->kedirjenan)),
        ];
    }
}
