<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class CouponSubscriptionPlan extends Model
{
    use HasFactory;
    protected $table = 'coupon_subscription_plan';
    public $timestamps = false;

    protected $fillable = ['coupon_id', 'subscription_plan_id'];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'subscription_plan_id');
    }

}
