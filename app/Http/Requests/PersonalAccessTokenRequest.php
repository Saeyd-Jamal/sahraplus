<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalAccessTokenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tokenable_type' => 'string|max:191',
            'tokenable_id' => 'integer',
            'name' => 'string|max:191',
            'token' => 'string|max:64',
            'abilities' => 'string',
            'last_used_at' => 'date',
            'expires_at' => 'date',
        ];
    }
}
