<?php
namespace App\Services;

use App\Models\Job;
use App\Repositories\JobRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class JobService
{
	/**
     * @var JobRepository $jobRepository
     */
    protected $jobRepository;

    /**
     * DummyClass constructor.
     *
     * @param JobRepository $jobRepository
     */
    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    /**
     * Get all jobRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->jobRepository->all();
    }

    /**
     * Get jobRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->jobRepository->getById($id);
    }

    /**
     * Validate jobRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->jobRepository->save($data);
    }

    /**
     * Update jobRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $jobRepository = $this->jobRepository->update($data, $id);
            DB::commit();
            return $jobRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete jobRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $jobRepository = $this->jobRepository->delete($id);
            DB::commit();
            return $jobRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
