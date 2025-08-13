<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCouponRedeemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'coupon_code' => $this->coupon_code,
            'discount' => $this->discount,
            'user_id' => $this->user_id,
            'coupon_id' => $this->coupon_id,
            'booking_id' => $this->booking_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
