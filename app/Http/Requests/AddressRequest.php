<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'address_line_1' => 'string|max:191',
            'address_line_2' => 'string|max:191',
            'postal_code' => 'string|max:191',
            'city' => 'string|max:191',
            'state' => 'string|max:191',
            'country' => 'string|max:191',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'is_primary' => 'integer',
            'addressable_type' => 'string|max:191',
            'addressable_id' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
