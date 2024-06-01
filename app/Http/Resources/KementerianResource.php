<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KementerianResource extends JsonResource
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
            'program_kerja' => $this->program_kerja,
            'description' => $this->description,
            'kedirjenan' => KedirjenanResource::collection($this->kedirjenan),
        ];
    }
}
