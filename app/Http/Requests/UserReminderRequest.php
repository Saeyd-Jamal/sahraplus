<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserReminderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'entertainment_id' => 'integer',
            'user_id' => 'integer',
            'profile_id' => 'integer',
            'release_date' => 'date',
            'is_remind' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
