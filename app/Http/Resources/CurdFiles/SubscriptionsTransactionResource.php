<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionsTransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'subscriptions_id' => $this->subscriptions_id,
            'user_id' => $this->user_id,
            'amount' => $this->amount,
            'payment_type' => $this->payment_type,
            'payment_status' => $this->payment_status,
            'transaction_id' => $this->transaction_id,
            'tax_data' => $this->tax_data,
            'other_transactions_details' => $this->other_transactions_details,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
