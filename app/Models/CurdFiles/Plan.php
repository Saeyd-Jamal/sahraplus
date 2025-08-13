<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Plan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'plan';
    protected $fillable = ['name', 'identifier', 'android_identifier', 'apple_identifier', 'price', 'discount', 'discount_percentage', 'total_price', 'level', 'duration', 'duration_value', 'status', 'description', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    public function couponSubscriptionPlan()
    {
        return $this->hasMany(CouponSubscriptionPlan::class, 'subscription_plan_id');
    }

}
