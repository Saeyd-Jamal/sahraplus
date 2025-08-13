<?php
namespace App\Services;

use App\Models\EntertainmentStreamContentMapping;
use App\Repositories\EntertainmentStreamContentMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class EntertainmentStreamContentMappingService
{
	/**
     * @var EntertainmentStreamContentMappingRepository $entertainmentStreamContentMappingRepository
     */
    protected $entertainmentStreamContentMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param EntertainmentStreamContentMappingRepository $entertainmentStreamContentMappingRepository
     */
    public function __construct(EntertainmentStreamContentMappingRepository $entertainmentStreamContentMappingRepository)
    {
        $this->entertainmentStreamContentMappingRepository = $entertainmentStreamContentMappingRepository;
    }

    /**
     * Get all entertainmentStreamContentMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->entertainmentStreamContentMappingRepository->all();
    }

    /**
     * Get entertainmentStreamContentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->entertainmentStreamContentMappingRepository->getById($id);
    }

    /**
     * Validate entertainmentStreamContentMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->entertainmentStreamContentMappingRepository->save($data);
    }

    /**
     * Update entertainmentStreamContentMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentStreamContentMappingRepository = $this->entertainmentStreamContentMappingRepository->update($data, $id);
            DB::commit();
            return $entertainmentStreamContentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete entertainmentStreamContentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentStreamContentMappingRepository = $this->entertainmentStreamContentMappingRepository->delete($id);
            DB::commit();
            return $entertainmentStreamContentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
