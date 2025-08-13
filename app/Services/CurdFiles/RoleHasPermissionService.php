<?php
namespace App\Services;

use App\Models\RoleHasPermission;
use App\Repositories\RoleHasPermissionRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class RoleHasPermissionService
{
	/**
     * @var RoleHasPermissionRepository $roleHasPermissionRepository
     */
    protected $roleHasPermissionRepository;

    /**
     * DummyClass constructor.
     *
     * @param RoleHasPermissionRepository $roleHasPermissionRepository
     */
    public function __construct(RoleHasPermissionRepository $roleHasPermissionRepository)
    {
        $this->roleHasPermissionRepository = $roleHasPermissionRepository;
    }

    /**
     * Get all roleHasPermissionRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->roleHasPermissionRepository->all();
    }

    /**
     * Get roleHasPermissionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->roleHasPermissionRepository->getById($id);
    }

    /**
     * Validate roleHasPermissionRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->roleHasPermissionRepository->save($data);
    }

    /**
     * Update roleHasPermissionRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $roleHasPermissionRepository = $this->roleHasPermissionRepository->update($data, $id);
            DB::commit();
            return $roleHasPermissionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete roleHasPermissionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $roleHasPermissionRepository = $this->roleHasPermissionRepository->delete($id);
            DB::commit();
            return $roleHasPermissionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
