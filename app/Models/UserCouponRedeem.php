<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class UserCouponRedeem extends Model
{
    use HasFactory;
    protected $table = 'user_coupon_redeem';
    protected $fillable = ['coupon_code', 'discount', 'user_id', 'coupon_id', 'booking_id', 'created_by', 'updated_by'];
}
