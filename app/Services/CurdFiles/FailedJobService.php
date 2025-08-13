<?php
namespace App\Services;

use App\Models\FailedJob;
use App\Repositories\FailedJobRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class FailedJobService
{
	/**
     * @var FailedJobRepository $failedJobRepository
     */
    protected $failedJobRepository;

    /**
     * DummyClass constructor.
     *
     * @param FailedJobRepository $failedJobRepository
     */
    public function __construct(FailedJobRepository $failedJobRepository)
    {
        $this->failedJobRepository = $failedJobRepository;
    }

    /**
     * Get all failedJobRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->failedJobRepository->all();
    }

    /**
     * Get failedJobRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->failedJobRepository->getById($id);
    }

    /**
     * Validate failedJobRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->failedJobRepository->save($data);
    }

    /**
     * Update failedJobRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $failedJobRepository = $this->failedJobRepository->update($data, $id);
            DB::commit();
            return $failedJobRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete failedJobRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $failedJobRepository = $this->failedJobRepository->delete($id);
            DB::commit();
            return $failedJobRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
