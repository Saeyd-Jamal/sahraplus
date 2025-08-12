<?php
namespace App\Services;

use App\Models\ModelHasPermission;
use App\Repositories\ModelHasPermissionRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class ModelHasPermissionService
{
	/**
     * @var ModelHasPermissionRepository $modelHasPermissionRepository
     */
    protected $modelHasPermissionRepository;

    /**
     * DummyClass constructor.
     *
     * @param ModelHasPermissionRepository $modelHasPermissionRepository
     */
    public function __construct(ModelHasPermissionRepository $modelHasPermissionRepository)
    {
        $this->modelHasPermissionRepository = $modelHasPermissionRepository;
    }

    /**
     * Get all modelHasPermissionRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->modelHasPermissionRepository->all();
    }

    /**
     * Get modelHasPermissionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->modelHasPermissionRepository->getById($id);
    }

    /**
     * Validate modelHasPermissionRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->modelHasPermissionRepository->save($data);
    }

    /**
     * Update modelHasPermissionRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $modelHasPermissionRepository = $this->modelHasPermissionRepository->update($data, $id);
            DB::commit();
            return $modelHasPermissionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete modelHasPermissionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $modelHasPermissionRepository = $this->modelHasPermissionRepository->delete($id);
            DB::commit();
            return $modelHasPermissionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
