<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityLogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'log_name' => 'string|max:191',
            'description' => 'string',
            'subject_type' => 'string|max:191',
            'subject_id' => 'integer',
            'event' => 'string|max:191',
            'causer_type' => 'string|max:191',
            'causer_id' => 'integer',
            'properties' => 'string',
            'batch_uuid' => 'string|max:36',
        ];
    }
}
