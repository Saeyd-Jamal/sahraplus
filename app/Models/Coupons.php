<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Coupons extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'coupons';
    protected $fillable = ['code', 'description', 'start_date', 'expire_date', 'discount_type', 'discount', 'status', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'];

    public function couponSubscriptionPlan()
    {
        return $this->hasMany(CouponSubscriptionPlan::class, 'coupon_id');
    }

}
