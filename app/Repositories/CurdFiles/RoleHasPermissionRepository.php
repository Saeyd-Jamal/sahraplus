<?php
namespace App\Repositories;

use App\Models\RoleHasPermission;

class RoleHasPermissionRepository
{
	 /**
     * @var RoleHasPermission
     */
    protected RoleHasPermission $roleHasPermission;

    /**
     * RoleHasPermission constructor.
     *
     * @param RoleHasPermission $roleHasPermission
     */
    public function __construct(RoleHasPermission $roleHasPermission)
    {
        $this->roleHasPermission = $roleHasPermission;
    }

    /**
     * Get all roleHasPermission.
     *
     * @return RoleHasPermission $roleHasPermission
     */
    public function all()
    {
        return $this->roleHasPermission->get();
    }

     /**
     * Get roleHasPermission by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->roleHasPermission->find($id);
    }

    /**
     * Save RoleHasPermission
     *
     * @param $data
     * @return RoleHasPermission
     */
     public function save(array $data)
    {
        return RoleHasPermission::create($data);
    }

     /**
     * Update RoleHasPermission
     *
     * @param $data
     * @return RoleHasPermission
     */
    public function update(array $data, int $id)
    {
        $roleHasPermission = $this->roleHasPermission->find($id);
        $roleHasPermission->update($data);
        return $roleHasPermission;
    }

    /**
     * Delete RoleHasPermission
     *
     * @param $data
     * @return RoleHasPermission
     */
   	 public function delete(int $id)
    {
        $roleHasPermission = $this->roleHasPermission->find($id);
        $roleHasPermission->delete();
        return $roleHasPermission;
    }
}
