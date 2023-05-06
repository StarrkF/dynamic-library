<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => $this->user,
            'type' => $this->type,
            'list_type' => $this->list_type,
            'status' => $this->status_model,
            'in_library' => $this->in_library_model,
            'name' => $this->name,
            'author' => $this->author,
            'author_slug' => $this->author_slug,
            'publisher' => $this->publisher,
            'page_count' => $this->page_count,
            'detail' => $this->detail,
            'buy_date' => $this->buy_date,
            'read_date' => $this->read_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
