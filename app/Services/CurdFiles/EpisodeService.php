<?php
namespace App\Services;

use App\Models\Episode;
use App\Repositories\EpisodeRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class EpisodeService
{
	/**
     * @var EpisodeRepository $episodeRepository
     */
    protected $episodeRepository;

    /**
     * DummyClass constructor.
     *
     * @param EpisodeRepository $episodeRepository
     */
    public function __construct(EpisodeRepository $episodeRepository)
    {
        $this->episodeRepository = $episodeRepository;
    }

    /**
     * Get all episodeRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->episodeRepository->all();
    }

    /**
     * Get episodeRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->episodeRepository->getById($id);
    }

    /**
     * Validate episodeRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->episodeRepository->save($data);
    }

    /**
     * Update episodeRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $episodeRepository = $this->episodeRepository->update($data, $id);
            DB::commit();
            return $episodeRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete episodeRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $episodeRepository = $this->episodeRepository->delete($id);
            DB::commit();
            return $episodeRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
