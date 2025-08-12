<?php
namespace App\Services;

use App\Models\PlanlimitationMapping;
use App\Repositories\PlanlimitationMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class PlanlimitationMappingService
{
	/**
     * @var PlanlimitationMappingRepository $planlimitationMappingRepository
     */
    protected $planlimitationMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param PlanlimitationMappingRepository $planlimitationMappingRepository
     */
    public function __construct(PlanlimitationMappingRepository $planlimitationMappingRepository)
    {
        $this->planlimitationMappingRepository = $planlimitationMappingRepository;
    }

    /**
     * Get all planlimitationMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->planlimitationMappingRepository->all();
    }

    /**
     * Get planlimitationMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->planlimitationMappingRepository->getById($id);
    }

    /**
     * Validate planlimitationMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->planlimitationMappingRepository->save($data);
    }

    /**
     * Update planlimitationMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $planlimitationMappingRepository = $this->planlimitationMappingRepository->update($data, $id);
            DB::commit();
            return $planlimitationMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete planlimitationMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $planlimitationMappingRepository = $this->planlimitationMappingRepository->delete($id);
            DB::commit();
            return $planlimitationMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
