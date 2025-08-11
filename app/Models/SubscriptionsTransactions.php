<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class SubscriptionsTransactions extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'subscriptions_transactions';
    protected $fillable = ['subscriptions_id', 'user_id', 'amount', 'payment_type', 'payment_status', 'transaction_id', 'tax_data', 'other_transactions_details', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
