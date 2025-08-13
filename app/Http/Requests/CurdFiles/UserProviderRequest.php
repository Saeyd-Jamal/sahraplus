<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProviderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'integer',
            'provider' => 'string|max:191',
            'provider_id' => 'string|max:191',
            'avatar' => 'string|max:191',
        ];
    }
}
