<?php
namespace App\Services;

use App\Models\MobileSetting;
use App\Repositories\MobileSettingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class MobileSettingService
{
	/**
     * @var MobileSettingRepository $mobileSettingRepository
     */
    protected $mobileSettingRepository;

    /**
     * DummyClass constructor.
     *
     * @param MobileSettingRepository $mobileSettingRepository
     */
    public function __construct(MobileSettingRepository $mobileSettingRepository)
    {
        $this->mobileSettingRepository = $mobileSettingRepository;
    }

    /**
     * Get all mobileSettingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->mobileSettingRepository->all();
    }

    /**
     * Get mobileSettingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->mobileSettingRepository->getById($id);
    }

    /**
     * Validate mobileSettingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->mobileSettingRepository->save($data);
    }

    /**
     * Update mobileSettingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $mobileSettingRepository = $this->mobileSettingRepository->update($data, $id);
            DB::commit();
            return $mobileSettingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete mobileSettingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $mobileSettingRepository = $this->mobileSettingRepository->delete($id);
            DB::commit();
            return $mobileSettingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
