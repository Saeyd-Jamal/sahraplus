<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilemanagerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'file_url' => $this->file_url,
            'file_name' => $this->file_name,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
