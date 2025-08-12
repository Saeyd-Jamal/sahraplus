<?php
namespace App\Repositories;

use App\Models\WatchHistory;

class WatchHistoryRepository
{
	 /**
     * @var WatchHistory
     */
    protected WatchHistory $watchHistory;

    /**
     * WatchHistory constructor.
     *
     * @param WatchHistory $watchHistory
     */
    public function __construct(WatchHistory $watchHistory)
    {
        $this->watchHistory = $watchHistory;
    }

    /**
     * Get all watchHistory.
     *
     * @return WatchHistory $watchHistory
     */
    public function all()
    {
        return $this->watchHistory->get();
    }

     /**
     * Get watchHistory by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->watchHistory->find($id);
    }

    /**
     * Save WatchHistory
     *
     * @param $data
     * @return WatchHistory
     */
     public function save(array $data)
    {
        return WatchHistory::create($data);
    }

     /**
     * Update WatchHistory
     *
     * @param $data
     * @return WatchHistory
     */
    public function update(array $data, int $id)
    {
        $watchHistory = $this->watchHistory->find($id);
        $watchHistory->update($data);
        return $watchHistory;
    }

    /**
     * Delete WatchHistory
     *
     * @param $data
     * @return WatchHistory
     */
   	 public function delete(int $id)
    {
        $watchHistory = $this->watchHistory->find($id);
        $watchHistory->delete();
        return $watchHistory;
    }
}
