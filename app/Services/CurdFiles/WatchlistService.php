<?php
namespace App\Services;

use App\Models\Watchlist;
use App\Repositories\WatchlistRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class WatchlistService
{
	/**
     * @var WatchlistRepository $watchlistRepository
     */
    protected $watchlistRepository;

    /**
     * DummyClass constructor.
     *
     * @param WatchlistRepository $watchlistRepository
     */
    public function __construct(WatchlistRepository $watchlistRepository)
    {
        $this->watchlistRepository = $watchlistRepository;
    }

    /**
     * Get all watchlistRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->watchlistRepository->all();
    }

    /**
     * Get watchlistRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->watchlistRepository->getById($id);
    }

    /**
     * Validate watchlistRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->watchlistRepository->save($data);
    }

    /**
     * Update watchlistRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $watchlistRepository = $this->watchlistRepository->update($data, $id);
            DB::commit();
            return $watchlistRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete watchlistRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $watchlistRepository = $this->watchlistRepository->delete($id);
            DB::commit();
            return $watchlistRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
