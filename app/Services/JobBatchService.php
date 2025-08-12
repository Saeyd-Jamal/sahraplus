<?php
namespace App\Services;

use App\Models\JobBatch;
use App\Repositories\JobBatchRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class JobBatchService
{
	/**
     * @var JobBatchRepository $jobBatchRepository
     */
    protected $jobBatchRepository;

    /**
     * DummyClass constructor.
     *
     * @param JobBatchRepository $jobBatchRepository
     */
    public function __construct(JobBatchRepository $jobBatchRepository)
    {
        $this->jobBatchRepository = $jobBatchRepository;
    }

    /**
     * Get all jobBatchRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->jobBatchRepository->all();
    }

    /**
     * Get jobBatchRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->jobBatchRepository->getById($id);
    }

    /**
     * Validate jobBatchRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->jobBatchRepository->save($data);
    }

    /**
     * Update jobBatchRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $jobBatchRepository = $this->jobBatchRepository->update($data, $id);
            DB::commit();
            return $jobBatchRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete jobBatchRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $jobBatchRepository = $this->jobBatchRepository->delete($id);
            DB::commit();
            return $jobBatchRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
