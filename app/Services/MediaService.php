<?php
namespace App\Services;

use App\Models\Media;
use App\Repositories\MediaRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class MediaService
{
	/**
     * @var MediaRepository $mediaRepository
     */
    protected $mediaRepository;

    /**
     * DummyClass constructor.
     *
     * @param MediaRepository $mediaRepository
     */
    public function __construct(MediaRepository $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }

    /**
     * Get all mediaRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->mediaRepository->all();
    }

    /**
     * Get mediaRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->mediaRepository->getById($id);
    }

    /**
     * Validate mediaRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->mediaRepository->save($data);
    }

    /**
     * Update mediaRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $mediaRepository = $this->mediaRepository->update($data, $id);
            DB::commit();
            return $mediaRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete mediaRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $mediaRepository = $this->mediaRepository->delete($id);
            DB::commit();
            return $mediaRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
