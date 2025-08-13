<?php
namespace App\Services;

use App\Models\EntertainmentTalentMapping;
use App\Repositories\EntertainmentTalentMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class EntertainmentTalentMappingService
{
	/**
     * @var EntertainmentTalentMappingRepository $entertainmentTalentMappingRepository
     */
    protected $entertainmentTalentMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param EntertainmentTalentMappingRepository $entertainmentTalentMappingRepository
     */
    public function __construct(EntertainmentTalentMappingRepository $entertainmentTalentMappingRepository)
    {
        $this->entertainmentTalentMappingRepository = $entertainmentTalentMappingRepository;
    }

    /**
     * Get all entertainmentTalentMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->entertainmentTalentMappingRepository->all();
    }

    /**
     * Get entertainmentTalentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->entertainmentTalentMappingRepository->getById($id);
    }

    /**
     * Validate entertainmentTalentMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->entertainmentTalentMappingRepository->save($data);
    }

    /**
     * Update entertainmentTalentMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentTalentMappingRepository = $this->entertainmentTalentMappingRepository->update($data, $id);
            DB::commit();
            return $entertainmentTalentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete entertainmentTalentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentTalentMappingRepository = $this->entertainmentTalentMappingRepository->delete($id);
            DB::commit();
            return $entertainmentTalentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
