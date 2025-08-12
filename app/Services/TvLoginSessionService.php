<?php
namespace App\Services;

use App\Models\TvLoginSession;
use App\Repositories\TvLoginSessionRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class TvLoginSessionService
{
	/**
     * @var TvLoginSessionRepository $tvLoginSessionRepository
     */
    protected $tvLoginSessionRepository;

    /**
     * DummyClass constructor.
     *
     * @param TvLoginSessionRepository $tvLoginSessionRepository
     */
    public function __construct(TvLoginSessionRepository $tvLoginSessionRepository)
    {
        $this->tvLoginSessionRepository = $tvLoginSessionRepository;
    }

    /**
     * Get all tvLoginSessionRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->tvLoginSessionRepository->all();
    }

    /**
     * Get tvLoginSessionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->tvLoginSessionRepository->getById($id);
    }

    /**
     * Validate tvLoginSessionRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->tvLoginSessionRepository->save($data);
    }

    /**
     * Update tvLoginSessionRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $tvLoginSessionRepository = $this->tvLoginSessionRepository->update($data, $id);
            DB::commit();
            return $tvLoginSessionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete tvLoginSessionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $tvLoginSessionRepository = $this->tvLoginSessionRepository->delete($id);
            DB::commit();
            return $tvLoginSessionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
