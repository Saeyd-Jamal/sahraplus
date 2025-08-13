<?php
namespace App\Services;

use App\Models\Constant;
use App\Repositories\ConstantRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class ConstantService
{
	/**
     * @var ConstantRepository $constantRepository
     */
    protected $constantRepository;

    /**
     * DummyClass constructor.
     *
     * @param ConstantRepository $constantRepository
     */
    public function __construct(ConstantRepository $constantRepository)
    {
        $this->constantRepository = $constantRepository;
    }

    /**
     * Get all constantRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->constantRepository->all();
    }

    /**
     * Get constantRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->constantRepository->getById($id);
    }

    /**
     * Validate constantRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->constantRepository->save($data);
    }

    /**
     * Update constantRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $constantRepository = $this->constantRepository->update($data, $id);
            DB::commit();
            return $constantRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete constantRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $constantRepository = $this->constantRepository->delete($id);
            DB::commit();
            return $constantRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
