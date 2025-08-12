<?php
namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
	 /**
     * @var Role
     */
    protected Role $role;

    /**
     * Role constructor.
     *
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * Get all role.
     *
     * @return Role $role
     */
    public function all()
    {
        return $this->role->get();
    }

     /**
     * Get role by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->role->find($id);
    }

    /**
     * Save Role
     *
     * @param $data
     * @return Role
     */
     public function save(array $data)
    {
        return Role::create($data);
    }

     /**
     * Update Role
     *
     * @param $data
     * @return Role
     */
    public function update(array $data, int $id)
    {
        $role = $this->role->find($id);
        $role->update($data);
        return $role;
    }

    /**
     * Delete Role
     *
     * @param $data
     * @return Role
     */
   	 public function delete(int $id)
    {
        $role = $this->role->find($id);
        $role->delete();
        return $role;
    }
}
