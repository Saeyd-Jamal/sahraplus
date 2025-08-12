<?php
namespace App\Services;

use App\Models\Video;
use App\Repositories\VideoRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class VideoService
{
	/**
     * @var VideoRepository $videoRepository
     */
    protected $videoRepository;

    /**
     * DummyClass constructor.
     *
     * @param VideoRepository $videoRepository
     */
    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     * Get all videoRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->videoRepository->all();
    }

    /**
     * Get videoRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->videoRepository->getById($id);
    }

    /**
     * Validate videoRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->videoRepository->save($data);
    }

    /**
     * Update videoRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $videoRepository = $this->videoRepository->update($data, $id);
            DB::commit();
            return $videoRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete videoRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $videoRepository = $this->videoRepository->delete($id);
            DB::commit();
            return $videoRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
