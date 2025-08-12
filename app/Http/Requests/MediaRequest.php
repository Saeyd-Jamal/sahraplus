<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'model_type' => 'string|max:191',
            'model_id' => 'integer',
            'uuid' => 'string|max:36',
            'collection_name' => 'string|max:191',
            'name' => 'string|max:191',
            'file_name' => 'string|max:191',
            'mime_type' => 'string|max:191',
            'disk' => 'string|max:191',
            'conversions_disk' => 'string|max:191',
            'size' => 'integer',
            'manipulations' => 'string',
            'custom_properties' => 'string',
            'generated_conversions' => 'string',
            'responsive_images' => 'string',
            'order_column' => 'integer',
        ];
    }
}
