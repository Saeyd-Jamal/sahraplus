<?php
namespace App\Services;

use App\Models\CouponSubscriptionPlan;
use App\Repositories\CouponSubscriptionPlanRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class CouponSubscriptionPlanService
{
	/**
     * @var CouponSubscriptionPlanRepository $couponSubscriptionPlanRepository
     */
    protected $couponSubscriptionPlanRepository;

    /**
     * DummyClass constructor.
     *
     * @param CouponSubscriptionPlanRepository $couponSubscriptionPlanRepository
     */
    public function __construct(CouponSubscriptionPlanRepository $couponSubscriptionPlanRepository)
    {
        $this->couponSubscriptionPlanRepository = $couponSubscriptionPlanRepository;
    }

    /**
     * Get all couponSubscriptionPlanRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->couponSubscriptionPlanRepository->all();
    }

    /**
     * Get couponSubscriptionPlanRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->couponSubscriptionPlanRepository->getById($id);
    }

    /**
     * Validate couponSubscriptionPlanRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->couponSubscriptionPlanRepository->save($data);
    }

    /**
     * Update couponSubscriptionPlanRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $couponSubscriptionPlanRepository = $this->couponSubscriptionPlanRepository->update($data, $id);
            DB::commit();
            return $couponSubscriptionPlanRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete couponSubscriptionPlanRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $couponSubscriptionPlanRepository = $this->couponSubscriptionPlanRepository->delete($id);
            DB::commit();
            return $couponSubscriptionPlanRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
