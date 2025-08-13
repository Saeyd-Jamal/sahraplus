<?php
namespace App\Services;

use App\Models\VideoStreamContentMapping;
use App\Repositories\VideoStreamContentMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class VideoStreamContentMappingService
{
	/**
     * @var VideoStreamContentMappingRepository $videoStreamContentMappingRepository
     */
    protected $videoStreamContentMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param VideoStreamContentMappingRepository $videoStreamContentMappingRepository
     */
    public function __construct(VideoStreamContentMappingRepository $videoStreamContentMappingRepository)
    {
        $this->videoStreamContentMappingRepository = $videoStreamContentMappingRepository;
    }

    /**
     * Get all videoStreamContentMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->videoStreamContentMappingRepository->all();
    }

    /**
     * Get videoStreamContentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->videoStreamContentMappingRepository->getById($id);
    }

    /**
     * Validate videoStreamContentMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->videoStreamContentMappingRepository->save($data);
    }

    /**
     * Update videoStreamContentMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $videoStreamContentMappingRepository = $this->videoStreamContentMappingRepository->update($data, $id);
            DB::commit();
            return $videoStreamContentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete videoStreamContentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $videoStreamContentMappingRepository = $this->videoStreamContentMappingRepository->delete($id);
            DB::commit();
            return $videoStreamContentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
