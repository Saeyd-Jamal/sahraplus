<?php
namespace App\Services;

use App\Models\WatchHistory;
use App\Repositories\WatchHistoryRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class WatchHistoryService
{
	/**
     * @var WatchHistoryRepository $watchHistoryRepository
     */
    protected $watchHistoryRepository;

    /**
     * DummyClass constructor.
     *
     * @param WatchHistoryRepository $watchHistoryRepository
     */
    public function __construct(WatchHistoryRepository $watchHistoryRepository)
    {
        $this->watchHistoryRepository = $watchHistoryRepository;
    }

    /**
     * Get all watchHistoryRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->watchHistoryRepository->all();
    }

    /**
     * Get watchHistoryRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->watchHistoryRepository->getById($id);
    }

    /**
     * Validate watchHistoryRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->watchHistoryRepository->save($data);
    }

    /**
     * Update watchHistoryRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $watchHistoryRepository = $this->watchHistoryRepository->update($data, $id);
            DB::commit();
            return $watchHistoryRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete watchHistoryRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $watchHistoryRepository = $this->watchHistoryRepository->delete($id);
            DB::commit();
            return $watchHistoryRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
