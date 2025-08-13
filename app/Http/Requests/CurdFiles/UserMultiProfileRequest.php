<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserMultiProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'integer',
            'name' => 'string|max:191',
            'avatar' => 'string|max:191',
            'is_default' => 'integer',
            'is_child_profile' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
