<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'string|max:191',
            'first_name' => 'string|max:191',
            'last_name' => 'string|max:191',
            'email' => 'string|max:191',
            'mobile' => 'string|max:191',
            'login_type' => 'string|max:191',
            'file_url' => 'string',
            'gender' => 'string|max:191',
            'date_of_birth' => 'date',
            'email_verified_at' => 'date',
            'password' => 'string|max:191',
            'is_banned' => 'integer',
            'is_subscribe' => 'integer',
            'status' => 'integer',
            'last_notification_seen' => 'date',
            'address' => 'string',
            'user_type' => 'string|max:191',
            'pin' => 'integer',
            'otp' => 'integer',
            'is_parental_lock_enable' => 'integer',
            'remember_token' => 'string|max:100',
            'deleted_at' => 'date',
            'father_code' => 'string|max:191',
        ];
    }
}
