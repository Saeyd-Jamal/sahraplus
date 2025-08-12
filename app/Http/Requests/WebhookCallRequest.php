<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebhookCallRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:191',
            'url' => 'string|max:191',
            'headers' => 'string',
            'payload' => 'string',
            'exception' => 'string',
        ];
    }
}
