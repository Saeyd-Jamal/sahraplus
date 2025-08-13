<?php
namespace App\Repositories;

use App\Models\Watchlist;

class WatchlistRepository
{
	 /**
     * @var Watchlist
     */
    protected Watchlist $watchlist;

    /**
     * Watchlist constructor.
     *
     * @param Watchlist $watchlist
     */
    public function __construct(Watchlist $watchlist)
    {
        $this->watchlist = $watchlist;
    }

    /**
     * Get all watchlist.
     *
     * @return Watchlist $watchlist
     */
    public function all()
    {
        return $this->watchlist->get();
    }

     /**
     * Get watchlist by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->watchlist->find($id);
    }

    /**
     * Save Watchlist
     *
     * @param $data
     * @return Watchlist
     */
     public function save(array $data)
    {
        return Watchlist::create($data);
    }

     /**
     * Update Watchlist
     *
     * @param $data
     * @return Watchlist
     */
    public function update(array $data, int $id)
    {
        $watchlist = $this->watchlist->find($id);
        $watchlist->update($data);
        return $watchlist;
    }

    /**
     * Delete Watchlist
     *
     * @param $data
     * @return Watchlist
     */
   	 public function delete(int $id)
    {
        $watchlist = $this->watchlist->find($id);
        $watchlist->delete();
        return $watchlist;
    }
}
