<?php
namespace App\Repositories;

use App\Models\CouponSubscriptionPlan;

class CouponSubscriptionPlanRepository
{
	 /**
     * @var CouponSubscriptionPlan
     */
    protected CouponSubscriptionPlan $couponSubscriptionPlan;

    /**
     * CouponSubscriptionPlan constructor.
     *
     * @param CouponSubscriptionPlan $couponSubscriptionPlan
     */
    public function __construct(CouponSubscriptionPlan $couponSubscriptionPlan)
    {
        $this->couponSubscriptionPlan = $couponSubscriptionPlan;
    }

    /**
     * Get all couponSubscriptionPlan.
     *
     * @return CouponSubscriptionPlan $couponSubscriptionPlan
     */
    public function all()
    {
        return $this->couponSubscriptionPlan->get();
    }

     /**
     * Get couponSubscriptionPlan by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->couponSubscriptionPlan->find($id);
    }

    /**
     * Save CouponSubscriptionPlan
     *
     * @param $data
     * @return CouponSubscriptionPlan
     */
     public function save(array $data)
    {
        return CouponSubscriptionPlan::create($data);
    }

     /**
     * Update CouponSubscriptionPlan
     *
     * @param $data
     * @return CouponSubscriptionPlan
     */
    public function update(array $data, int $id)
    {
        $couponSubscriptionPlan = $this->couponSubscriptionPlan->find($id);
        $couponSubscriptionPlan->update($data);
        return $couponSubscriptionPlan;
    }

    /**
     * Delete CouponSubscriptionPlan
     *
     * @param $data
     * @return CouponSubscriptionPlan
     */
   	 public function delete(int $id)
    {
        $couponSubscriptionPlan = $this->couponSubscriptionPlan->find($id);
        $couponSubscriptionPlan->delete();
        return $couponSubscriptionPlan;
    }
}
