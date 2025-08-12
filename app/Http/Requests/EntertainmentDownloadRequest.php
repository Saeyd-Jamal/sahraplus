<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntertainmentDownloadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'entertainment_id' => 'integer',
            'user_id' => 'integer',
            'entertainment_type' => 'string|max:191',
            'is_download' => 'integer',
            'type' => 'string|max:191',
            'quality' => 'string|max:191',
            'device_id' => 'string|max:191',
            'url' => 'string',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
