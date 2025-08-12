<?php
namespace App\Services;

use App\Models\Coupon;
use App\Repositories\CouponRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class CouponService
{
	/**
     * @var CouponRepository $couponRepository
     */
    protected $couponRepository;

    /**
     * DummyClass constructor.
     *
     * @param CouponRepository $couponRepository
     */
    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    /**
     * Get all couponRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->couponRepository->all();
    }

    /**
     * Get couponRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->couponRepository->getById($id);
    }

    /**
     * Validate couponRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->couponRepository->save($data);
    }

    /**
     * Update couponRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $couponRepository = $this->couponRepository->update($data, $id);
            DB::commit();
            return $couponRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete couponRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $couponRepository = $this->couponRepository->delete($id);
            DB::commit();
            return $couponRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
