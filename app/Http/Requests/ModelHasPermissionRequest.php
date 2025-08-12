<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelHasPermissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'permission_id' => 'integer',
            'model_type' => 'string|max:191',
            'model_id' => 'integer',
        ];
    }
}
