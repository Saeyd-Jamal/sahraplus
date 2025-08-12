<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'identifier' => $this->identifier,
            'android_identifier' => $this->android_identifier,
            'apple_identifier' => $this->apple_identifier,
            'price' => $this->price,
            'discount' => $this->discount,
            'discount_percentage' => $this->discount_percentage,
            'total_price' => $this->total_price,
            'level' => $this->level,
            'duration' => $this->duration,
            'duration_value' => $this->duration_value,
            'status' => $this->status,
            'description' => $this->description,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
