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
            'type' => $this->type,
            'list_type_id' => $this->list_type_id,
            'list_type_name' => $this->list_type_name,
            'name' => $this->name,
            'author' => $this->author,
            'author_slug' => $this->author_slug,
            'publisher' => $this->publisher,
            'page_count' => $this->page_count,
            'in_library' => $this->in_library,
            'status' => $this->status,
            'status_name' => $this->status_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'buy_date' => $this->buy_date,
            'read_date' => $this->read_date
        ];
    }
}
