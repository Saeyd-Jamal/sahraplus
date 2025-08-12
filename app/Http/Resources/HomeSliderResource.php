<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeSliderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'title_el' => $this->title_el,
            'title_fr' => $this->title_fr,
            'title_de' => $this->title_de,
            'type' => $this->type,
            'position' => $this->position,
            'status' => $this->status,
            'numbering' => $this->numbering,
            'is_restricted' => $this->is_restricted,
        ];
    }
}
