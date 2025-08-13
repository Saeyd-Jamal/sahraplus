<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'plan_id' => $this->plan_id,
            'user_id' => $this->user_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'is_manual' => $this->is_manual,
            'amount' => $this->amount,
            'discount_percentage' => $this->discount_percentage,
            'tax_amount' => $this->tax_amount,
            'coupon_discount' => $this->coupon_discount,
            'total_amount' => $this->total_amount,
            'name' => $this->name,
            'identifier' => $this->identifier,
            'type' => $this->type,
            'duration' => $this->duration,
            'level' => $this->level,
            'plan_type' => $this->plan_type,
            'payment_id' => $this->payment_id,
            'device_id' => $this->device_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
