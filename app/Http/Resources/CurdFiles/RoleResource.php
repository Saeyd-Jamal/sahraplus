<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'title' => $this->title,
            'guard_name' => $this->guard_name,
            'is_fixed' => $this->is_fixed,
        ];
    }
}
