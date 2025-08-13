<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponSubscriptionPlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'coupon_id' => 'integer',
            'subscription_plan_id' => 'integer',
        ];
    }
}
