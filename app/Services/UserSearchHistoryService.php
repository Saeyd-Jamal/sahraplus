<?php
namespace App\Services;

use App\Models\UserSearchHistory;
use App\Repositories\UserSearchHistoryRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class UserSearchHistoryService
{
	/**
     * @var UserSearchHistoryRepository $userSearchHistoryRepository
     */
    protected $userSearchHistoryRepository;

    /**
     * DummyClass constructor.
     *
     * @param UserSearchHistoryRepository $userSearchHistoryRepository
     */
    public function __construct(UserSearchHistoryRepository $userSearchHistoryRepository)
    {
        $this->userSearchHistoryRepository = $userSearchHistoryRepository;
    }

    /**
     * Get all userSearchHistoryRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->userSearchHistoryRepository->all();
    }

    /**
     * Get userSearchHistoryRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->userSearchHistoryRepository->getById($id);
    }

    /**
     * Validate userSearchHistoryRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->userSearchHistoryRepository->save($data);
    }

    /**
     * Update userSearchHistoryRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $userSearchHistoryRepository = $this->userSearchHistoryRepository->update($data, $id);
            DB::commit();
            return $userSearchHistoryRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete userSearchHistoryRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $userSearchHistoryRepository = $this->userSearchHistoryRepository->delete($id);
            DB::commit();
            return $userSearchHistoryRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
