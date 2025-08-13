<?php
namespace App\Services;

use App\Models\Subtitle;
use App\Repositories\SubtitleRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class SubtitleService
{
	/**
     * @var SubtitleRepository $subtitleRepository
     */
    protected $subtitleRepository;

    /**
     * DummyClass constructor.
     *
     * @param SubtitleRepository $subtitleRepository
     */
    public function __construct(SubtitleRepository $subtitleRepository)
    {
        $this->subtitleRepository = $subtitleRepository;
    }

    /**
     * Get all subtitleRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->subtitleRepository->all();
    }

    /**
     * Get subtitleRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->subtitleRepository->getById($id);
    }

    /**
     * Validate subtitleRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->subtitleRepository->save($data);
    }

    /**
     * Update subtitleRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $subtitleRepository = $this->subtitleRepository->update($data, $id);
            DB::commit();
            return $subtitleRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete subtitleRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $subtitleRepository = $this->subtitleRepository->delete($id);
            DB::commit();
            return $subtitleRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
