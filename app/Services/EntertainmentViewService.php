<?php
namespace App\Services;

use App\Models\EntertainmentView;
use App\Repositories\EntertainmentViewRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class EntertainmentViewService
{
	/**
     * @var EntertainmentViewRepository $entertainmentViewRepository
     */
    protected $entertainmentViewRepository;

    /**
     * DummyClass constructor.
     *
     * @param EntertainmentViewRepository $entertainmentViewRepository
     */
    public function __construct(EntertainmentViewRepository $entertainmentViewRepository)
    {
        $this->entertainmentViewRepository = $entertainmentViewRepository;
    }

    /**
     * Get all entertainmentViewRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->entertainmentViewRepository->all();
    }

    /**
     * Get entertainmentViewRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->entertainmentViewRepository->getById($id);
    }

    /**
     * Validate entertainmentViewRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->entertainmentViewRepository->save($data);
    }

    /**
     * Update entertainmentViewRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentViewRepository = $this->entertainmentViewRepository->update($data, $id);
            DB::commit();
            return $entertainmentViewRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete entertainmentViewRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentViewRepository = $this->entertainmentViewRepository->delete($id);
            DB::commit();
            return $entertainmentViewRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
