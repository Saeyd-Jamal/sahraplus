<?php
namespace App\Services;

use App\Models\NotificationTemplateContentMapping;
use App\Repositories\NotificationTemplateContentMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class NotificationTemplateContentMappingService
{
	/**
     * @var NotificationTemplateContentMappingRepository $notificationTemplateContentMappingRepository
     */
    protected $notificationTemplateContentMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param NotificationTemplateContentMappingRepository $notificationTemplateContentMappingRepository
     */
    public function __construct(NotificationTemplateContentMappingRepository $notificationTemplateContentMappingRepository)
    {
        $this->notificationTemplateContentMappingRepository = $notificationTemplateContentMappingRepository;
    }

    /**
     * Get all notificationTemplateContentMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->notificationTemplateContentMappingRepository->all();
    }

    /**
     * Get notificationTemplateContentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->notificationTemplateContentMappingRepository->getById($id);
    }

    /**
     * Validate notificationTemplateContentMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->notificationTemplateContentMappingRepository->save($data);
    }

    /**
     * Update notificationTemplateContentMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $notificationTemplateContentMappingRepository = $this->notificationTemplateContentMappingRepository->update($data, $id);
            DB::commit();
            return $notificationTemplateContentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete notificationTemplateContentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $notificationTemplateContentMappingRepository = $this->notificationTemplateContentMappingRepository->delete($id);
            DB::commit();
            return $notificationTemplateContentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
