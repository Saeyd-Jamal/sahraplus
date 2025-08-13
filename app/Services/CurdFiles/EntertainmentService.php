<?php
namespace App\Services;

use App\Models\Entertainment;
use App\Repositories\EntertainmentRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class EntertainmentService
{
	/**
     * @var EntertainmentRepository $entertainmentRepository
     */
    protected $entertainmentRepository;

    /**
     * DummyClass constructor.
     *
     * @param EntertainmentRepository $entertainmentRepository
     */
    public function __construct(EntertainmentRepository $entertainmentRepository)
    {
        $this->entertainmentRepository = $entertainmentRepository;
    }

    /**
     * Get all entertainmentRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->entertainmentRepository->all();
    }

    /**
     * Get entertainmentRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->entertainmentRepository->getById($id);
    }

    /**
     * Validate entertainmentRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->entertainmentRepository->save($data);
    }

    /**
     * Update entertainmentRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentRepository = $this->entertainmentRepository->update($data, $id);
            DB::commit();
            return $entertainmentRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete entertainmentRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentRepository = $this->entertainmentRepository->delete($id);
            DB::commit();
            return $entertainmentRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
