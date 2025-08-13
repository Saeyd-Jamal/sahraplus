<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'username' => $this->username,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'login_type' => $this->login_type,
            'file_url' => $this->file_url,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
            'is_banned' => $this->is_banned,
            'is_subscribe' => $this->is_subscribe,
            'status' => $this->status,
            'last_notification_seen' => $this->last_notification_seen,
            'address' => $this->address,
            'user_type' => $this->user_type,
            'pin' => $this->pin,
            'otp' => $this->otp,
            'is_parental_lock_enable' => $this->is_parental_lock_enable,
            'remember_token' => $this->remember_token,
            'deleted_at' => $this->deleted_at,
            'father_code' => $this->father_code,
        ];
    }
}
