<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionsTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subscriptions_id' => 'integer',
            'user_id' => 'integer',
            'amount' => 'numeric',
            'payment_type' => 'string|max:191',
            'payment_status' => 'string|max:191',
            'transaction_id' => 'string|max:191',
            'tax_data' => 'string',
            'other_transactions_details' => 'string',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'deleted_by' => 'integer',
            'deleted_at' => 'date',
        ];
    }
}
