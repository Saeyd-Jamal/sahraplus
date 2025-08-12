<?php
namespace App\Repositories;

use App\Models\JobBatch;

class JobBatchRepository
{
	 /**
     * @var JobBatch
     */
    protected JobBatch $jobBatch;

    /**
     * JobBatch constructor.
     *
     * @param JobBatch $jobBatch
     */
    public function __construct(JobBatch $jobBatch)
    {
        $this->jobBatch = $jobBatch;
    }

    /**
     * Get all jobBatch.
     *
     * @return JobBatch $jobBatch
     */
    public function all()
    {
        return $this->jobBatch->get();
    }

     /**
     * Get jobBatch by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->jobBatch->find($id);
    }

    /**
     * Save JobBatch
     *
     * @param $data
     * @return JobBatch
     */
     public function save(array $data)
    {
        return JobBatch::create($data);
    }

     /**
     * Update JobBatch
     *
     * @param $data
     * @return JobBatch
     */
    public function update(array $data, int $id)
    {
        $jobBatch = $this->jobBatch->find($id);
        $jobBatch->update($data);
        return $jobBatch;
    }

    /**
     * Delete JobBatch
     *
     * @param $data
     * @return JobBatch
     */
   	 public function delete(int $id)
    {
        $jobBatch = $this->jobBatch->find($id);
        $jobBatch->delete();
        return $jobBatch;
    }
}
