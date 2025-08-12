<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'home_slider_id' => $this->home_slider_id,
            'item_id' => $this->item_id,
            'position' => $this->position,
        ];
    }
}
