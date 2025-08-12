<?php
namespace App\Services;

use App\Models\ContinueWatch;
use App\Repositories\ContinueWatchRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class ContinueWatchService
{
	/**
     * @var ContinueWatchRepository $continueWatchRepository
     */
    protected $continueWatchRepository;

    /**
     * DummyClass constructor.
     *
     * @param ContinueWatchRepository $continueWatchRepository
     */
    public function __construct(ContinueWatchRepository $continueWatchRepository)
    {
        $this->continueWatchRepository = $continueWatchRepository;
    }

    /**
     * Get all continueWatchRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->continueWatchRepository->all();
    }

    /**
     * Get continueWatchRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->continueWatchRepository->getById($id);
    }

    /**
     * Validate continueWatchRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->continueWatchRepository->save($data);
    }

    /**
     * Update continueWatchRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $continueWatchRepository = $this->continueWatchRepository->update($data, $id);
            DB::commit();
            return $continueWatchRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete continueWatchRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $continueWatchRepository = $this->continueWatchRepository->delete($id);
            DB::commit();
            return $continueWatchRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
