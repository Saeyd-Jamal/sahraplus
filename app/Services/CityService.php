<?php
namespace App\Services;

use App\Models\City;
use App\Repositories\CityRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class CityService
{
	/**
     * @var CityRepository $cityRepository
     */
    protected $cityRepository;

    /**
     * DummyClass constructor.
     *
     * @param CityRepository $cityRepository
     */
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * Get all cityRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->cityRepository->all();
    }

    /**
     * Get cityRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->cityRepository->getById($id);
    }

    /**
     * Validate cityRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->cityRepository->save($data);
    }

    /**
     * Update cityRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $cityRepository = $this->cityRepository->update($data, $id);
            DB::commit();
            return $cityRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete cityRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $cityRepository = $this->cityRepository->delete($id);
            DB::commit();
            return $cityRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
