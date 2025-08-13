<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'queue' => 'string|max:191',
            'payload' => 'string',
            'attempts' => 'integer',
            'reserved_at' => 'integer',
            'available_at' => 'integer',
        ];
    }
}
