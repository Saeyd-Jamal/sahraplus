<?php
namespace App\Services;

use App\Models\EntertainmentCountryMapping;
use App\Repositories\EntertainmentCountryMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class EntertainmentCountryMappingService
{
	/**
     * @var EntertainmentCountryMappingRepository $entertainmentCountryMappingRepository
     */
    protected $entertainmentCountryMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param EntertainmentCountryMappingRepository $entertainmentCountryMappingRepository
     */
    public function __construct(EntertainmentCountryMappingRepository $entertainmentCountryMappingRepository)
    {
        $this->entertainmentCountryMappingRepository = $entertainmentCountryMappingRepository;
    }

    /**
     * Get all entertainmentCountryMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->entertainmentCountryMappingRepository->all();
    }

    /**
     * Get entertainmentCountryMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->entertainmentCountryMappingRepository->getById($id);
    }

    /**
     * Validate entertainmentCountryMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->entertainmentCountryMappingRepository->save($data);
    }

    /**
     * Update entertainmentCountryMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentCountryMappingRepository = $this->entertainmentCountryMappingRepository->update($data, $id);
            DB::commit();
            return $entertainmentCountryMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete entertainmentCountryMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentCountryMappingRepository = $this->entertainmentCountryMappingRepository->delete($id);
            DB::commit();
            return $entertainmentCountryMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
