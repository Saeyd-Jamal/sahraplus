<?php
namespace App\Repositories;

use App\Models\UserSearchHistory;

class UserSearchHistoryRepository
{
	 /**
     * @var UserSearchHistory
     */
    protected UserSearchHistory $userSearchHistory;

    /**
     * UserSearchHistory constructor.
     *
     * @param UserSearchHistory $userSearchHistory
     */
    public function __construct(UserSearchHistory $userSearchHistory)
    {
        $this->userSearchHistory = $userSearchHistory;
    }

    /**
     * Get all userSearchHistory.
     *
     * @return UserSearchHistory $userSearchHistory
     */
    public function all()
    {
        return $this->userSearchHistory->get();
    }

     /**
     * Get userSearchHistory by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->userSearchHistory->find($id);
    }

    /**
     * Save UserSearchHistory
     *
     * @param $data
     * @return UserSearchHistory
     */
     public function save(array $data)
    {
        return UserSearchHistory::create($data);
    }

     /**
     * Update UserSearchHistory
     *
     * @param $data
     * @return UserSearchHistory
     */
    public function update(array $data, int $id)
    {
        $userSearchHistory = $this->userSearchHistory->find($id);
        $userSearchHistory->update($data);
        return $userSearchHistory;
    }

    /**
     * Delete UserSearchHistory
     *
     * @param $data
     * @return UserSearchHistory
     */
   	 public function delete(int $id)
    {
        $userSearchHistory = $this->userSearchHistory->find($id);
        $userSearchHistory->delete();
        return $userSearchHistory;
    }
}
