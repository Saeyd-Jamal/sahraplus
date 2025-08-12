<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeSliderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_ar' => 'string|max:191',
            'title_en' => 'string|max:191',
            'title_el' => 'string|max:191',
            'title_fr' => 'string|max:191',
            'title_de' => 'string|max:191',
            'type' => 'in:movie,tvshow',
            'position' => 'integer',
            'status' => 'integer',
            'numbering' => 'string|max:191',
            'is_restricted' => 'integer',
        ];
    }
}
