<?php
namespace App\Services;

use App\Models\UserCouponRedeem;
use App\Repositories\UserCouponRedeemRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class UserCouponRedeemService
{
	/**
     * @var UserCouponRedeemRepository $userCouponRedeemRepository
     */
    protected $userCouponRedeemRepository;

    /**
     * DummyClass constructor.
     *
     * @param UserCouponRedeemRepository $userCouponRedeemRepository
     */
    public function __construct(UserCouponRedeemRepository $userCouponRedeemRepository)
    {
        $this->userCouponRedeemRepository = $userCouponRedeemRepository;
    }

    /**
     * Get all userCouponRedeemRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->userCouponRedeemRepository->all();
    }

    /**
     * Get userCouponRedeemRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->userCouponRedeemRepository->getById($id);
    }

    /**
     * Validate userCouponRedeemRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->userCouponRedeemRepository->save($data);
    }

    /**
     * Update userCouponRedeemRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $userCouponRedeemRepository = $this->userCouponRedeemRepository->update($data, $id);
            DB::commit();
            return $userCouponRedeemRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete userCouponRedeemRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $userCouponRedeemRepository = $this->userCouponRedeemRepository->delete($id);
            DB::commit();
            return $userCouponRedeemRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
