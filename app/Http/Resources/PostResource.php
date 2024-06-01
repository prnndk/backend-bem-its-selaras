<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'category' => $this->whenNotNull(CategoryResource::make($this->category)),
            'content' => $this->content,
            'image' => $this->image,
            'image_caption' => $this->image_caption,
            'slug' => $this->slug,
            'views' => $this->views,
            'tag' => $this->tag,
            'kemenkoan' => $this->whenNotNull(KemenkoanResource::make($this->kemenkoan)),
            'kementerian' => $this->whenNotNull(KementerianNonDetailResource::make($this->kementerian)),
            'published_at' => $this->published_at,
        ];
    }
}
