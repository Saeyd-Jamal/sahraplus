<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntertainmentCountryMappingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'entertainment_id' => $this->entertainment_id,
            'country_id' => $this->country_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
