<?php
namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository
{
	 /**
     * @var Permission
     */
    protected Permission $permission;

    /**
     * Permission constructor.
     *
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Get all permission.
     *
     * @return Permission $permission
     */
    public function all()
    {
        return $this->permission->get();
    }

     /**
     * Get permission by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->permission->find($id);
    }

    /**
     * Save Permission
     *
     * @param $data
     * @return Permission
     */
     public function save(array $data)
    {
        return Permission::create($data);
    }

     /**
     * Update Permission
     *
     * @param $data
     * @return Permission
     */
    public function update(array $data, int $id)
    {
        $permission = $this->permission->find($id);
        $permission->update($data);
        return $permission;
    }

    /**
     * Delete Permission
     *
     * @param $data
     * @return Permission
     */
   	 public function delete(int $id)
    {
        $permission = $this->permission->find($id);
        $permission->delete();
        return $permission;
    }
}
