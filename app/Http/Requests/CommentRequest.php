<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'short_id' => 'integer',
            'user_id' => 'integer',
            'parent_id' => 'integer',
            'body' => 'string',
            'media_url' => 'string|max:191',
            'likes_count' => 'integer',
            'replies_count' => 'integer',
            'is_edited' => 'integer',
            'status' => 'in:pending,approved,hidden,deleted',
            'deleted_at' => 'date',
        ];
    }
}
