<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'string|max:36',
            'type' => 'string|max:191',
            'notifiable_type' => 'string|max:191',
            'notifiable_id' => 'integer',
            'data' => 'string',
            'read_at' => 'date',
        ];
    }
}
