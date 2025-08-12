<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanlimitationMappingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'plan_id' => 'integer',
            'planlimitation_id' => 'integer',
            'limitation_slug' => 'string|max:191',
            'limitation_value' => 'integer',
            'limit' => 'string',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
