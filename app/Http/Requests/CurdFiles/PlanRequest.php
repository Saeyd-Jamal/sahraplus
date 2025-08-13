<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:191',
            'identifier' => 'string|max:191',
            'android_identifier' => 'string|max:191',
            'apple_identifier' => 'string|max:191',
            'price' => 'numeric',
            'discount' => 'integer',
            'discount_percentage' => 'numeric',
            'total_price' => 'numeric',
            'level' => 'integer',
            'duration' => 'string|max:191',
            'duration_value' => 'integer',
            'status' => 'integer',
            'description' => 'string',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
