<?php
namespace App\Repositories;

use App\Models\NotificationTemplate;

class NotificationTemplateRepository
{
	 /**
     * @var NotificationTemplate
     */
    protected NotificationTemplate $notificationTemplate;

    /**
     * NotificationTemplate constructor.
     *
     * @param NotificationTemplate $notificationTemplate
     */
    public function __construct(NotificationTemplate $notificationTemplate)
    {
        $this->notificationTemplate = $notificationTemplate;
    }

    /**
     * Get all notificationTemplate.
     *
     * @return NotificationTemplate $notificationTemplate
     */
    public function all()
    {
        return $this->notificationTemplate->get();
    }

     /**
     * Get notificationTemplate by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->notificationTemplate->find($id);
    }

    /**
     * Save NotificationTemplate
     *
     * @param $data
     * @return NotificationTemplate
     */
     public function save(array $data)
    {
        return NotificationTemplate::create($data);
    }

     /**
     * Update NotificationTemplate
     *
     * @param $data
     * @return NotificationTemplate
     */
    public function update(array $data, int $id)
    {
        $notificationTemplate = $this->notificationTemplate->find($id);
        $notificationTemplate->update($data);
        return $notificationTemplate;
    }

    /**
     * Delete NotificationTemplate
     *
     * @param $data
     * @return NotificationTemplate
     */
   	 public function delete(int $id)
    {
        $notificationTemplate = $this->notificationTemplate->find($id);
        $notificationTemplate->delete();
        return $notificationTemplate;
    }
}
