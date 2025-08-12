<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubtitleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_name' => 'string|max:191',
            'url' => 'string|max:191',
            'subtitable_type' => 'string|max:191',
            'subtitable_id' => 'integer',
            'default' => 'string|max:191',
        ];
    }
}
