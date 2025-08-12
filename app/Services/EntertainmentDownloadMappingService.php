<?php
namespace App\Services;

use App\Models\EntertainmentDownloadMapping;
use App\Repositories\EntertainmentDownloadMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class EntertainmentDownloadMappingService
{
	/**
     * @var EntertainmentDownloadMappingRepository $entertainmentDownloadMappingRepository
     */
    protected $entertainmentDownloadMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param EntertainmentDownloadMappingRepository $entertainmentDownloadMappingRepository
     */
    public function __construct(EntertainmentDownloadMappingRepository $entertainmentDownloadMappingRepository)
    {
        $this->entertainmentDownloadMappingRepository = $entertainmentDownloadMappingRepository;
    }

    /**
     * Get all entertainmentDownloadMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->entertainmentDownloadMappingRepository->all();
    }

    /**
     * Get entertainmentDownloadMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->entertainmentDownloadMappingRepository->getById($id);
    }

    /**
     * Validate entertainmentDownloadMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->entertainmentDownloadMappingRepository->save($data);
    }

    /**
     * Update entertainmentDownloadMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentDownloadMappingRepository = $this->entertainmentDownloadMappingRepository->update($data, $id);
            DB::commit();
            return $entertainmentDownloadMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete entertainmentDownloadMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentDownloadMappingRepository = $this->entertainmentDownloadMappingRepository->delete($id);
            DB::commit();
            return $entertainmentDownloadMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
