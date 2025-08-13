<?php
namespace App\Services;

use App\Models\EpisodeDownloadMapping;
use App\Repositories\EpisodeDownloadMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class EpisodeDownloadMappingService
{
	/**
     * @var EpisodeDownloadMappingRepository $episodeDownloadMappingRepository
     */
    protected $episodeDownloadMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param EpisodeDownloadMappingRepository $episodeDownloadMappingRepository
     */
    public function __construct(EpisodeDownloadMappingRepository $episodeDownloadMappingRepository)
    {
        $this->episodeDownloadMappingRepository = $episodeDownloadMappingRepository;
    }

    /**
     * Get all episodeDownloadMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->episodeDownloadMappingRepository->all();
    }

    /**
     * Get episodeDownloadMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->episodeDownloadMappingRepository->getById($id);
    }

    /**
     * Validate episodeDownloadMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->episodeDownloadMappingRepository->save($data);
    }

    /**
     * Update episodeDownloadMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $episodeDownloadMappingRepository = $this->episodeDownloadMappingRepository->update($data, $id);
            DB::commit();
            return $episodeDownloadMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete episodeDownloadMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $episodeDownloadMappingRepository = $this->episodeDownloadMappingRepository->delete($id);
            DB::commit();
            return $episodeDownloadMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
