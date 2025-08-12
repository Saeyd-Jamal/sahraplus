<?php
namespace App\Services;

use App\Models\State;
use App\Repositories\StateRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class StateService
{
	/**
     * @var StateRepository $stateRepository
     */
    protected $stateRepository;

    /**
     * DummyClass constructor.
     *
     * @param StateRepository $stateRepository
     */
    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    /**
     * Get all stateRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->stateRepository->all();
    }

    /**
     * Get stateRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->stateRepository->getById($id);
    }

    /**
     * Validate stateRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->stateRepository->save($data);
    }

    /**
     * Update stateRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $stateRepository = $this->stateRepository->update($data, $id);
            DB::commit();
            return $stateRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete stateRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $stateRepository = $this->stateRepository->delete($id);
            DB::commit();
            return $stateRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
