<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'string|max:100',
            'type' => 'string|max:100',
            'value' => 'numeric',
            'status' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
