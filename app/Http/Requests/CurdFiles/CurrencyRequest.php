<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'currency_name' => 'string|max:191',
            'currency_symbol' => 'string|max:191',
            'currency_code' => 'string|max:191',
            'is_primary' => 'integer',
            'currency_position' => 'in:left,right,left_with_space,right_with_space',
            'no_of_decimal' => 'integer',
            'thousand_separator' => 'string|max:191',
            'decimal_separator' => 'string|max:191',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
