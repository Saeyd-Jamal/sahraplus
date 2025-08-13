<?php
namespace App\Services;

use App\Models\Livetv;
use App\Repositories\LivetvRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class LivetvService
{
	/**
     * @var LivetvRepository $livetvRepository
     */
    protected $livetvRepository;

    /**
     * DummyClass constructor.
     *
     * @param LivetvRepository $livetvRepository
     */
    public function __construct(LivetvRepository $livetvRepository)
    {
        $this->livetvRepository = $livetvRepository;
    }

    /**
     * Get all livetvRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->livetvRepository->all();
    }

    /**
     * Get livetvRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->livetvRepository->getById($id);
    }

    /**
     * Validate livetvRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->livetvRepository->save($data);
    }

    /**
     * Update livetvRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $livetvRepository = $this->livetvRepository->update($data, $id);
            DB::commit();
            return $livetvRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete livetvRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $livetvRepository = $this->livetvRepository->delete($id);
            DB::commit();
            return $livetvRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
