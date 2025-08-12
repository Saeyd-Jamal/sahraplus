<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceProviderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'slug' => 'string|max:191',
            'name' => 'string|max:191',
            'description' => 'string',
            'payment_method' => 'string|max:191',
            'manager_id' => 'integer',
            'status' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'contact_email' => 'string',
            'contact_number' => 'string|max:191',
            'deleted_at' => 'date',
        ];
    }
}
