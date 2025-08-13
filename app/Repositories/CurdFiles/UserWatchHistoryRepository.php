<?php
namespace App\Repositories;

use App\Models\UserWatchHistory;

class UserWatchHistoryRepository
{
	 /**
     * @var UserWatchHistory
     */
    protected UserWatchHistory $userWatchHistory;

    /**
     * UserWatchHistory constructor.
     *
     * @param UserWatchHistory $userWatchHistory
     */
    public function __construct(UserWatchHistory $userWatchHistory)
    {
        $this->userWatchHistory = $userWatchHistory;
    }

    /**
     * Get all userWatchHistory.
     *
     * @return UserWatchHistory $userWatchHistory
     */
    public function all()
    {
        return $this->userWatchHistory->get();
    }

     /**
     * Get userWatchHistory by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->userWatchHistory->find($id);
    }

    /**
     * Save UserWatchHistory
     *
     * @param $data
     * @return UserWatchHistory
     */
     public function save(array $data)
    {
        return UserWatchHistory::create($data);
    }

     /**
     * Update UserWatchHistory
     *
     * @param $data
     * @return UserWatchHistory
     */
    public function update(array $data, int $id)
    {
        $userWatchHistory = $this->userWatchHistory->find($id);
        $userWatchHistory->update($data);
        return $userWatchHistory;
    }

    /**
     * Delete UserWatchHistory
     *
     * @param $data
     * @return UserWatchHistory
     */
   	 public function delete(int $id)
    {
        $userWatchHistory = $this->userWatchHistory->find($id);
        $userWatchHistory->delete();
        return $userWatchHistory;
    }
}
