<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCouponRedeemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'coupon_code' => 'string|max:191',
            'discount' => 'numeric',
            'user_id' => 'integer',
            'coupon_id' => 'integer',
            'booking_id' => 'integer',
            'created_by' => 'integer',
            'updated_by' => 'integer',
        ];
    }
}
