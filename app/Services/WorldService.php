<?php
namespace App\Services;

use App\Models\World;
use App\Repositories\WorldRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class WorldService
{
	/**
     * @var WorldRepository $worldRepository
     */
    protected $worldRepository;

    /**
     * DummyClass constructor.
     *
     * @param WorldRepository $worldRepository
     */
    public function __construct(WorldRepository $worldRepository)
    {
        $this->worldRepository = $worldRepository;
    }

    /**
     * Get all worldRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->worldRepository->all();
    }

    /**
     * Get worldRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->worldRepository->getById($id);
    }

    /**
     * Validate worldRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->worldRepository->save($data);
    }

    /**
     * Update worldRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $worldRepository = $this->worldRepository->update($data, $id);
            DB::commit();
            return $worldRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete worldRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $worldRepository = $this->worldRepository->delete($id);
            DB::commit();
            return $worldRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
