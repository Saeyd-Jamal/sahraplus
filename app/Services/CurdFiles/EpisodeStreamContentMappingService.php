<?php
namespace App\Services;

use App\Models\EpisodeStreamContentMapping;
use App\Repositories\EpisodeStreamContentMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class EpisodeStreamContentMappingService
{
	/**
     * @var EpisodeStreamContentMappingRepository $episodeStreamContentMappingRepository
     */
    protected $episodeStreamContentMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param EpisodeStreamContentMappingRepository $episodeStreamContentMappingRepository
     */
    public function __construct(EpisodeStreamContentMappingRepository $episodeStreamContentMappingRepository)
    {
        $this->episodeStreamContentMappingRepository = $episodeStreamContentMappingRepository;
    }

    /**
     * Get all episodeStreamContentMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->episodeStreamContentMappingRepository->all();
    }

    /**
     * Get episodeStreamContentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->episodeStreamContentMappingRepository->getById($id);
    }

    /**
     * Validate episodeStreamContentMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->episodeStreamContentMappingRepository->save($data);
    }

    /**
     * Update episodeStreamContentMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $episodeStreamContentMappingRepository = $this->episodeStreamContentMappingRepository->update($data, $id);
            DB::commit();
            return $episodeStreamContentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete episodeStreamContentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $episodeStreamContentMappingRepository = $this->episodeStreamContentMappingRepository->delete($id);
            DB::commit();
            return $episodeStreamContentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
