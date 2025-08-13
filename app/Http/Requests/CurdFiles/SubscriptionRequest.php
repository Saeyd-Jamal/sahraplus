<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'plan_id' => 'integer',
            'user_id' => 'integer',
            'start_date' => 'date',
            'end_date' => 'date',
            'status' => 'string|max:191',
            'is_manual' => 'integer',
            'amount' => 'numeric',
            'discount_percentage' => 'numeric',
            'tax_amount' => 'numeric',
            'coupon_discount' => 'numeric',
            'total_amount' => 'numeric',
            'name' => 'string|max:191',
            'identifier' => 'string|max:191',
            'type' => 'string|max:191',
            'duration' => 'integer',
            'level' => 'integer',
            'plan_type' => 'string',
            'payment_id' => 'integer',
            'device_id' => 'string|max:191',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
