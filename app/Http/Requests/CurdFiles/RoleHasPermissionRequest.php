<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleHasPermissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'permission_id' => 'integer',
            'role_id' => 'integer',
        ];
    }
}
