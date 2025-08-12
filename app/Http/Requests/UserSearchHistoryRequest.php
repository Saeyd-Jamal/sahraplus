<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSearchHistoryRequest extends FormRequest
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
            'search_query' => 'string|max:191',
            'search_id' => 'integer',
            'type' => 'string|max:191',
        ];
    }
}
