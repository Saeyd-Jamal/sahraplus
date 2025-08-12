<?php
namespace App\Services;

use App\Models\CastCrew;
use App\Repositories\CastCrewRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class CastCrewService
{
	/**
     * @var CastCrewRepository $castCrewRepository
     */
    protected $castCrewRepository;

    /**
     * DummyClass constructor.
     *
     * @param CastCrewRepository $castCrewRepository
     */
    public function __construct(CastCrewRepository $castCrewRepository)
    {
        $this->castCrewRepository = $castCrewRepository;
    }

    /**
     * Get all castCrewRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->castCrewRepository->all();
    }

    /**
     * Get castCrewRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->castCrewRepository->getById($id);
    }

    /**
     * Validate castCrewRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->castCrewRepository->save($data);
    }

    /**
     * Update castCrewRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $castCrewRepository = $this->castCrewRepository->update($data, $id);
            DB::commit();
            return $castCrewRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete castCrewRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $castCrewRepository = $this->castCrewRepository->delete($id);
            DB::commit();
            return $castCrewRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
