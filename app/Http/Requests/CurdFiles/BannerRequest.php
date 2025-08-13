<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'string|max:191',
            'file_url' => 'string',
            'poster_url' => 'string',
            'type' => 'string|max:191',
            'type_id' => 'string|max:191',
            'type_name' => 'string|max:191',
            'status' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
            'banner_for' => 'string|max:20',
            'poster_tv_url' => 'string',
        ];
    }
}
