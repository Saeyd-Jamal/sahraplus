<?php
namespace App\Services;

use App\Models\NotificationTemplate;
use App\Repositories\NotificationTemplateRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class NotificationTemplateService
{
	/**
     * @var NotificationTemplateRepository $notificationTemplateRepository
     */
    protected $notificationTemplateRepository;

    /**
     * DummyClass constructor.
     *
     * @param NotificationTemplateRepository $notificationTemplateRepository
     */
    public function __construct(NotificationTemplateRepository $notificationTemplateRepository)
    {
        $this->notificationTemplateRepository = $notificationTemplateRepository;
    }

    /**
     * Get all notificationTemplateRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->notificationTemplateRepository->all();
    }

    /**
     * Get notificationTemplateRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->notificationTemplateRepository->getById($id);
    }

    /**
     * Validate notificationTemplateRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->notificationTemplateRepository->save($data);
    }

    /**
     * Update notificationTemplateRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $notificationTemplateRepository = $this->notificationTemplateRepository->update($data, $id);
            DB::commit();
            return $notificationTemplateRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete notificationTemplateRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $notificationTemplateRepository = $this->notificationTemplateRepository->delete($id);
            DB::commit();
            return $notificationTemplateRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
