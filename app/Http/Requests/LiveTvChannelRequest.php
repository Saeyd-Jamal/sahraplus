<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiveTvChannelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:191',
            'poster_url' => 'string',
            'category_id' => 'integer',
            'thumb_url' => 'string',
            'access' => 'string|max:191',
            'plan_id' => 'integer',
            'description' => 'string',
            'status' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
            'poster_tv_url' => 'string',
        ];
    }
}
