<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'short_id' => $this->short_id,
            'user_id' => $this->user_id,
            'parent_id' => $this->parent_id,
            'body' => $this->body,
            'media_url' => $this->media_url,
            'likes_count' => $this->likes_count,
            'replies_count' => $this->replies_count,
            'is_edited' => $this->is_edited,
            'status' => $this->status,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
