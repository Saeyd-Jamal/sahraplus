<?php
namespace App\Services;

use App\Models\Permission;
use App\Repositories\PermissionRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class PermissionService
{
	/**
     * @var PermissionRepository $permissionRepository
     */
    protected $permissionRepository;

    /**
     * DummyClass constructor.
     *
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Get all permissionRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->permissionRepository->all();
    }

    /**
     * Get permissionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->permissionRepository->getById($id);
    }

    /**
     * Validate permissionRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->permissionRepository->save($data);
    }

    /**
     * Update permissionRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $permissionRepository = $this->permissionRepository->update($data, $id);
            DB::commit();
            return $permissionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete permissionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $permissionRepository = $this->permissionRepository->delete($id);
            DB::commit();
            return $permissionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
