<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TvLoginSessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'session_id' => 'string|max:36',
            'user_id' => 'integer',
            'confirmed_at' => 'date',
            'expires_at' => 'date',
        ];
    }
}
