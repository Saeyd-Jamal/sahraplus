<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'string|max:191',
            'user_id' => 'integer',
            'ip_address' => 'string|max:45',
            'user_agent' => 'string',
            'payload' => 'string',
            'last_activity' => 'integer',
        ];
    }
}
