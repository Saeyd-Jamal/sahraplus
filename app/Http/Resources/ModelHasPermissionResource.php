<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModelHasPermissionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'permission_id' => $this->permission_id,
            'model_type' => $this->model_type,
            'model_id' => $this->model_id,
        ];
    }
}
