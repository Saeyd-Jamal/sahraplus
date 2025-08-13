<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationTemplateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:191',
            'label' => 'string|max:191',
            'description' => 'string',
            'type' => 'string|max:191',
            'to' => 'string',
            'bcc' => 'string',
            'cc' => 'string',
            'status' => 'integer',
            'channels' => 'string|max:191',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
