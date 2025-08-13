<?php
namespace App\Services;

use App\Models\UserWatchHistory;
use App\Repositories\UserWatchHistoryRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class UserWatchHistoryService
{
	/**
     * @var UserWatchHistoryRepository $userWatchHistoryRepository
     */
    protected $userWatchHistoryRepository;

    /**
     * DummyClass constructor.
     *
     * @param UserWatchHistoryRepository $userWatchHistoryRepository
     */
    public function __construct(UserWatchHistoryRepository $userWatchHistoryRepository)
    {
        $this->userWatchHistoryRepository = $userWatchHistoryRepository;
    }

    /**
     * Get all userWatchHistoryRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->userWatchHistoryRepository->all();
    }

    /**
     * Get userWatchHistoryRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->userWatchHistoryRepository->getById($id);
    }

    /**
     * Validate userWatchHistoryRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->userWatchHistoryRepository->save($data);
    }

    /**
     * Update userWatchHistoryRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $userWatchHistoryRepository = $this->userWatchHistoryRepository->update($data, $id);
            DB::commit();
            return $userWatchHistoryRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete userWatchHistoryRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $userWatchHistoryRepository = $this->userWatchHistoryRepository->delete($id);
            DB::commit();
            return $userWatchHistoryRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
