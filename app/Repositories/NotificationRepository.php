<?php
namespace App\Repositories;

use App\Models\Notification;

class NotificationRepository
{
	 /**
     * @var Notification
     */
    protected Notification $notification;

    /**
     * Notification constructor.
     *
     * @param Notification $notification
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Get all notification.
     *
     * @return Notification $notification
     */
    public function all()
    {
        return $this->notification->get();
    }

     /**
     * Get notification by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->notification->find($id);
    }

    /**
     * Save Notification
     *
     * @param $data
     * @return Notification
     */
     public function save(array $data)
    {
        return Notification::create($data);
    }

     /**
     * Update Notification
     *
     * @param $data
     * @return Notification
     */
    public function update(array $data, int $id)
    {
        $notification = $this->notification->find($id);
        $notification->update($data);
        return $notification;
    }

    /**
     * Delete Notification
     *
     * @param $data
     * @return Notification
     */
   	 public function delete(int $id)
    {
        $notification = $this->notification->find($id);
        $notification->delete();
        return $notification;
    }
}
