<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FailedJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'uuid' => 'string|max:191',
            'connection' => 'string',
            'queue' => 'string',
            'payload' => 'string',
            'exception' => 'string',
            'failed_at' => 'date',
        ];
    }
}
