<?php
namespace App\Repositories;

use App\Models\FailedJob;

class FailedJobRepository
{
	 /**
     * @var FailedJob
     */
    protected FailedJob $failedJob;

    /**
     * FailedJob constructor.
     *
     * @param FailedJob $failedJob
     */
    public function __construct(FailedJob $failedJob)
    {
        $this->failedJob = $failedJob;
    }

    /**
     * Get all failedJob.
     *
     * @return FailedJob $failedJob
     */
    public function all()
    {
        return $this->failedJob->get();
    }

     /**
     * Get failedJob by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->failedJob->find($id);
    }

    /**
     * Save FailedJob
     *
     * @param $data
     * @return FailedJob
     */
     public function save(array $data)
    {
        return FailedJob::create($data);
    }

     /**
     * Update FailedJob
     *
     * @param $data
     * @return FailedJob
     */
    public function update(array $data, int $id)
    {
        $failedJob = $this->failedJob->find($id);
        $failedJob->update($data);
        return $failedJob;
    }

    /**
     * Delete FailedJob
     *
     * @param $data
     * @return FailedJob
     */
   	 public function delete(int $id)
    {
        $failedJob = $this->failedJob->find($id);
        $failedJob->delete();
        return $failedJob;
    }
}
