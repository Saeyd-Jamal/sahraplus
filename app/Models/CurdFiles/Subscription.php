<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Subscription extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'subscriptions';
    protected $fillable = ['plan_id', 'user_id', 'start_date', 'end_date', 'status', 'is_manual', 'amount', 'discount_percentage', 'tax_amount', 'coupon_discount', 'total_amount', 'name', 'identifier', 'type', 'duration', 'level', 'plan_type', 'payment_id', 'device_id', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];
}
