<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'currency_name' => $this->currency_name,
            'currency_symbol' => $this->currency_symbol,
            'currency_code' => $this->currency_code,
            'is_primary' => $this->is_primary,
            'currency_position' => $this->currency_position,
            'no_of_decimal' => $this->no_of_decimal,
            'thousand_separator' => $this->thousand_separator,
            'decimal_separator' => $this->decimal_separator,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
