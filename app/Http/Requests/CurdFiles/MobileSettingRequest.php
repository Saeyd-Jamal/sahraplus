<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobileSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:191',
            'slug' => 'string|max:191',
            'position' => 'integer',
            'value' => 'string',
            'deleted_at' => 'date',
        ];
    }
}
