<?php
namespace App\Repositories;

use App\Models\UserCouponRedeem;

class UserCouponRedeemRepository
{
	 /**
     * @var UserCouponRedeem
     */
    protected UserCouponRedeem $userCouponRedeem;

    /**
     * UserCouponRedeem constructor.
     *
     * @param UserCouponRedeem $userCouponRedeem
     */
    public function __construct(UserCouponRedeem $userCouponRedeem)
    {
        $this->userCouponRedeem = $userCouponRedeem;
    }

    /**
     * Get all userCouponRedeem.
     *
     * @return UserCouponRedeem $userCouponRedeem
     */
    public function all()
    {
        return $this->userCouponRedeem->get();
    }

     /**
     * Get userCouponRedeem by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->userCouponRedeem->find($id);
    }

    /**
     * Save UserCouponRedeem
     *
     * @param $data
     * @return UserCouponRedeem
     */
     public function save(array $data)
    {
        return UserCouponRedeem::create($data);
    }

     /**
     * Update UserCouponRedeem
     *
     * @param $data
     * @return UserCouponRedeem
     */
    public function update(array $data, int $id)
    {
        $userCouponRedeem = $this->userCouponRedeem->find($id);
        $userCouponRedeem->update($data);
        return $userCouponRedeem;
    }

    /**
     * Delete UserCouponRedeem
     *
     * @param $data
     * @return UserCouponRedeem
     */
   	 public function delete(int $id)
    {
        $userCouponRedeem = $this->userCouponRedeem->find($id);
        $userCouponRedeem->delete();
        return $userCouponRedeem;
    }
}
