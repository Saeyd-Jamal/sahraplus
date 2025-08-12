<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'string|max:200',
            'description' => 'string',
            'video_path' => 'string|max:191',
            'poster_path' => 'string|max:191',
            'aspect_ratio' => 'in:vertical,horizontal',
            'likes_count' => 'integer',
            'comments_count' => 'integer',
            'shares_count' => 'integer',
            'share_url' => 'string|max:191',
            'is_featured' => 'integer',
            'status' => 'in:active,inactive',
        ];
    }
}
