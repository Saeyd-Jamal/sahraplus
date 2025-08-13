<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConstantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:191',
            'type' => 'string|max:191',
            'value' => 'string',
            'sequence' => 'integer',
            'sub_type' => 'string|max:191',
            'status' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
