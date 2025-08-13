<?php
namespace App\Services;

use App\Models\UserReminder;
use App\Repositories\UserReminderRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class UserReminderService
{
	/**
     * @var UserReminderRepository $userReminderRepository
     */
    protected $userReminderRepository;

    /**
     * DummyClass constructor.
     *
     * @param UserReminderRepository $userReminderRepository
     */
    public function __construct(UserReminderRepository $userReminderRepository)
    {
        $this->userReminderRepository = $userReminderRepository;
    }

    /**
     * Get all userReminderRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->userReminderRepository->all();
    }

    /**
     * Get userReminderRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->userReminderRepository->getById($id);
    }

    /**
     * Validate userReminderRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->userReminderRepository->save($data);
    }

    /**
     * Update userReminderRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $userReminderRepository = $this->userReminderRepository->update($data, $id);
            DB::commit();
            return $userReminderRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete userReminderRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $userReminderRepository = $this->userReminderRepository->delete($id);
            DB::commit();
            return $userReminderRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
