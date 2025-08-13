<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'about_self' => 'string|max:191',
            'expert' => 'string|max:191',
            'facebook_link' => 'string|max:191',
            'instagram_link' => 'string|max:191',
            'twitter_link' => 'string|max:191',
            'dribbble_link' => 'string|max:191',
            'user_id' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
