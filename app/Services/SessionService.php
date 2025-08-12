<?php
namespace App\Services;

use App\Models\Session;
use App\Repositories\SessionRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class SessionService
{
	/**
     * @var SessionRepository $sessionRepository
     */
    protected $sessionRepository;

    /**
     * DummyClass constructor.
     *
     * @param SessionRepository $sessionRepository
     */
    public function __construct(SessionRepository $sessionRepository)
    {
        $this->sessionRepository = $sessionRepository;
    }

    /**
     * Get all sessionRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->sessionRepository->all();
    }

    /**
     * Get sessionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->sessionRepository->getById($id);
    }

    /**
     * Validate sessionRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->sessionRepository->save($data);
    }

    /**
     * Update sessionRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $sessionRepository = $this->sessionRepository->update($data, $id);
            DB::commit();
            return $sessionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete sessionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $sessionRepository = $this->sessionRepository->delete($id);
            DB::commit();
            return $sessionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
