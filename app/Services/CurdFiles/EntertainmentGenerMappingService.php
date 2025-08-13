<?php
namespace App\Services;

use App\Models\EntertainmentGenerMapping;
use App\Repositories\EntertainmentGenerMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class EntertainmentGenerMappingService
{
	/**
     * @var EntertainmentGenerMappingRepository $entertainmentGenerMappingRepository
     */
    protected $entertainmentGenerMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param EntertainmentGenerMappingRepository $entertainmentGenerMappingRepository
     */
    public function __construct(EntertainmentGenerMappingRepository $entertainmentGenerMappingRepository)
    {
        $this->entertainmentGenerMappingRepository = $entertainmentGenerMappingRepository;
    }

    /**
     * Get all entertainmentGenerMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->entertainmentGenerMappingRepository->all();
    }

    /**
     * Get entertainmentGenerMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->entertainmentGenerMappingRepository->getById($id);
    }

    /**
     * Validate entertainmentGenerMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->entertainmentGenerMappingRepository->save($data);
    }

    /**
     * Update entertainmentGenerMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentGenerMappingRepository = $this->entertainmentGenerMappingRepository->update($data, $id);
            DB::commit();
            return $entertainmentGenerMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete entertainmentGenerMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentGenerMappingRepository = $this->entertainmentGenerMappingRepository->delete($id);
            DB::commit();
            return $entertainmentGenerMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
