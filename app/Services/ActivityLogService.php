<?php
namespace App\Services;

use App\Models\ActivityLog;
use App\Repositories\ActivityLogRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class ActivityLogService
{
	/**
     * @var ActivityLogRepository $activityLogRepository
     */
    protected $activityLogRepository;

    /**
     * DummyClass constructor.
     *
     * @param ActivityLogRepository $activityLogRepository
     */
    public function __construct(ActivityLogRepository $activityLogRepository)
    {
        $this->activityLogRepository = $activityLogRepository;
    }

    /**
     * Get all activityLogRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->activityLogRepository->all();
    }

    /**
     * Get activityLogRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->activityLogRepository->getById($id);
    }

    /**
     * Validate activityLogRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->activityLogRepository->save($data);
    }

    /**
     * Update activityLogRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $activityLogRepository = $this->activityLogRepository->update($data, $id);
            DB::commit();
            return $activityLogRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete activityLogRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $activityLogRepository = $this->activityLogRepository->delete($id);
            DB::commit();
            return $activityLogRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
