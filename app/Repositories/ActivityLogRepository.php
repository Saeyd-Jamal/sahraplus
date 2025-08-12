<?php
namespace App\Repositories;

use App\Models\ActivityLog;

class ActivityLogRepository
{
	 /**
     * @var ActivityLog
     */
    protected ActivityLog $activityLog;

    /**
     * ActivityLog constructor.
     *
     * @param ActivityLog $activityLog
     */
    public function __construct(ActivityLog $activityLog)
    {
        $this->activityLog = $activityLog;
    }

    /**
     * Get all activityLog.
     *
     * @return ActivityLog $activityLog
     */
    public function all()
    {
        return $this->activityLog->get();
    }

     /**
     * Get activityLog by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->activityLog->find($id);
    }

    /**
     * Save ActivityLog
     *
     * @param $data
     * @return ActivityLog
     */
     public function save(array $data)
    {
        return ActivityLog::create($data);
    }

     /**
     * Update ActivityLog
     *
     * @param $data
     * @return ActivityLog
     */
    public function update(array $data, int $id)
    {
        $activityLog = $this->activityLog->find($id);
        $activityLog->update($data);
        return $activityLog;
    }

    /**
     * Delete ActivityLog
     *
     * @param $data
     * @return ActivityLog
     */
   	 public function delete(int $id)
    {
        $activityLog = $this->activityLog->find($id);
        $activityLog->delete();
        return $activityLog;
    }
}
