<?php
namespace App\Repositories;

use App\Models\NotificationTemplateContentMapping;

class NotificationTemplateContentMappingRepository
{
	 /**
     * @var NotificationTemplateContentMapping
     */
    protected NotificationTemplateContentMapping $notificationTemplateContentMapping;

    /**
     * NotificationTemplateContentMapping constructor.
     *
     * @param NotificationTemplateContentMapping $notificationTemplateContentMapping
     */
    public function __construct(NotificationTemplateContentMapping $notificationTemplateContentMapping)
    {
        $this->notificationTemplateContentMapping = $notificationTemplateContentMapping;
    }

    /**
     * Get all notificationTemplateContentMapping.
     *
     * @return NotificationTemplateContentMapping $notificationTemplateContentMapping
     */
    public function all()
    {
        return $this->notificationTemplateContentMapping->get();
    }

     /**
     * Get notificationTemplateContentMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->notificationTemplateContentMapping->find($id);
    }

    /**
     * Save NotificationTemplateContentMapping
     *
     * @param $data
     * @return NotificationTemplateContentMapping
     */
     public function save(array $data)
    {
        return NotificationTemplateContentMapping::create($data);
    }

     /**
     * Update NotificationTemplateContentMapping
     *
     * @param $data
     * @return NotificationTemplateContentMapping
     */
    public function update(array $data, int $id)
    {
        $notificationTemplateContentMapping = $this->notificationTemplateContentMapping->find($id);
        $notificationTemplateContentMapping->update($data);
        return $notificationTemplateContentMapping;
    }

    /**
     * Delete NotificationTemplateContentMapping
     *
     * @param $data
     * @return NotificationTemplateContentMapping
     */
   	 public function delete(int $id)
    {
        $notificationTemplateContentMapping = $this->notificationTemplateContentMapping->find($id);
        $notificationTemplateContentMapping->delete();
        return $notificationTemplateContentMapping;
    }
}
