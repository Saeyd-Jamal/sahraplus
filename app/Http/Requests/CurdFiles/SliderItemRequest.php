<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'home_slider_id' => 'integer',
            'item_id' => 'integer',
            'position' => 'integer',
        ];
    }
}
