<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WatchHistoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'integer',
            'profile_id' => 'integer',
            'watchable_type' => 'string|max:191',
            'watchable_id' => 'integer',
            'duration_watched' => 'integer',
        ];
    }
}
