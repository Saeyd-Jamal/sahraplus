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
            'username' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:255',
            'login_type' => 'nullable|string|max:255',
            'file_url' => 'nullable|string',
            'gender' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'email_verified_at' => 'nullable|date',
            'password' => 'nullable|string|max:255',
            'is_banned' => 'nullable|integer',
            'is_subscribe' => 'nullable|integer',
            'status' => 'nullable|integer',
            'last_notification_seen' => 'nullable|date',
            'address' => 'nullable|string',
            'user_type' => 'nullable|string|max:255',
            'pin' => 'nullable|integer',
            'otp' => 'nullable|integer',
            'is_parental_lock_enable' => 'nullable|integer',
            'remember_token' => 'nullable|string|max:100',
            'deleted_at' => 'nullable|date',
            'father_code' => 'nullable|string|max:255',
            'avatar'  => 'nullable|string',
        ];
    }
}
