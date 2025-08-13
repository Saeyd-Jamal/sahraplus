<?php
namespace App\Services;

use App\Models\VideoDownloadMapping;
use App\Repositories\VideoDownloadMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class VideoDownloadMappingService
{
	/**
     * @var VideoDownloadMappingRepository $videoDownloadMappingRepository
     */
    protected $videoDownloadMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param VideoDownloadMappingRepository $videoDownloadMappingRepository
     */
    public function __construct(VideoDownloadMappingRepository $videoDownloadMappingRepository)
    {
        $this->videoDownloadMappingRepository = $videoDownloadMappingRepository;
    }

    /**
     * Get all videoDownloadMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->videoDownloadMappingRepository->all();
    }

    /**
     * Get videoDownloadMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->videoDownloadMappingRepository->getById($id);
    }

    /**
     * Validate videoDownloadMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->videoDownloadMappingRepository->save($data);
    }

    /**
     * Update videoDownloadMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $videoDownloadMappingRepository = $this->videoDownloadMappingRepository->update($data, $id);
            DB::commit();
            return $videoDownloadMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete videoDownloadMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $videoDownloadMappingRepository = $this->videoDownloadMappingRepository->delete($id);
            DB::commit();
            return $videoDownloadMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
