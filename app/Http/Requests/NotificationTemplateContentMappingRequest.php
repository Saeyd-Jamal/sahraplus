<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationTemplateContentMappingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'integer',
            'template_id' => 'integer',
            'language' => 'string|max:191',
            'template_detail' => 'string',
            'subject' => 'string|max:191',
            'notification_message' => 'string|max:191',
            'notification_link' => 'string|max:191',
            'status' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
