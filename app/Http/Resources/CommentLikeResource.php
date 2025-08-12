<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentLikeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'comment_id' => $this->comment_id,
            'user_id' => $this->user_id,
        ];
    }
}
