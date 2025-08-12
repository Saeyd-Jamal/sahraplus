<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProviderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'description' => $this->description,
            'payment_method' => $this->payment_method,
            'manager_id' => $this->manager_id,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'contact_email' => $this->contact_email,
            'contact_number' => $this->contact_number,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
