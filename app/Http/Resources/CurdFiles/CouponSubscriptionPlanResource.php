<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponSubscriptionPlanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'coupon_id' => $this->coupon_id,
            'subscription_plan_id' => $this->subscription_plan_id,
        ];
    }
}
