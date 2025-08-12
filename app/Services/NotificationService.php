<?php
namespace App\Services;

use App\Models\Notification;
use App\Repositories\NotificationRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class NotificationService
{
	/**
     * @var NotificationRepository $notificationRepository
     */
    protected $notificationRepository;

    /**
     * DummyClass constructor.
     *
     * @param NotificationRepository $notificationRepository
     */
    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * Get all notificationRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->notificationRepository->all();
    }

    /**
     * Get notificationRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->notificationRepository->getById($id);
    }

    /**
     * Validate notificationRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->notificationRepository->save($data);
    }

    /**
     * Update notificationRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $notificationRepository = $this->notificationRepository->update($data, $id);
            DB::commit();
            return $notificationRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete notificationRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $notificationRepository = $this->notificationRepository->delete($id);
            DB::commit();
            return $notificationRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
