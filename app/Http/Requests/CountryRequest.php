<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'string|max:191',
            'name' => 'string|max:191',
            'dial_code' => 'integer',
            'currency_name' => 'string|max:191',
            'symbol' => 'string|max:191',
            'currency_code' => 'string|max:191',
            'status' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
