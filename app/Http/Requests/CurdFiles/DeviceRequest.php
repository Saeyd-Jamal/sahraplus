<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'integer',
            'device_id' => 'string|max:191',
            'device_name' => 'string|max:191',
            'active_profile' => 'string|max:191',
            'platform' => 'string|max:191',
            'deleted_at' => 'date',
        ];
    }
}
