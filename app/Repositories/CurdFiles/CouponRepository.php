<?php
namespace App\Repositories;

use App\Models\Coupon;

class CouponRepository
{
	 /**
     * @var Coupon
     */
    protected Coupon $coupon;

    /**
     * Coupon constructor.
     *
     * @param Coupon $coupon
     */
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Get all coupon.
     *
     * @return Coupon $coupon
     */
    public function all()
    {
        return $this->coupon->get();
    }

     /**
     * Get coupon by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->coupon->find($id);
    }

    /**
     * Save Coupon
     *
     * @param $data
     * @return Coupon
     */
     public function save(array $data)
    {
        return Coupon::create($data);
    }

     /**
     * Update Coupon
     *
     * @param $data
     * @return Coupon
     */
    public function update(array $data, int $id)
    {
        $coupon = $this->coupon->find($id);
        $coupon->update($data);
        return $coupon;
    }

    /**
     * Delete Coupon
     *
     * @param $data
     * @return Coupon
     */
   	 public function delete(int $id)
    {
        $coupon = $this->coupon->find($id);
        $coupon->delete();
        return $coupon;
    }
}
