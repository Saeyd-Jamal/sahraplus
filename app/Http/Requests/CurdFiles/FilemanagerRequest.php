<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilemanagerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file_url' => 'string|max:191',
            'file_name' => 'string|max:191',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
