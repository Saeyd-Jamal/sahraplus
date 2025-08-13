<?php
namespace App\Repositories;

use App\Models\Job;

class JobRepository
{
	 /**
     * @var Job
     */
    protected Job $job;

    /**
     * Job constructor.
     *
     * @param Job $job
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Get all job.
     *
     * @return Job $job
     */
    public function all()
    {
        return $this->job->get();
    }

     /**
     * Get job by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->job->find($id);
    }

    /**
     * Save Job
     *
     * @param $data
     * @return Job
     */
     public function save(array $data)
    {
        return Job::create($data);
    }

     /**
     * Update Job
     *
     * @param $data
     * @return Job
     */
    public function update(array $data, int $id)
    {
        $job = $this->job->find($id);
        $job->update($data);
        return $job;
    }

    /**
     * Delete Job
     *
     * @param $data
     * @return Job
     */
   	 public function delete(int $id)
    {
        $job = $this->job->find($id);
        $job->delete();
        return $job;
    }
}
