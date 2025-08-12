<?php
namespace App\Repositories;

use App\Models\ModelHasRole;

class ModelHasRoleRepository
{
	 /**
     * @var ModelHasRole
     */
    protected ModelHasRole $modelHasRole;

    /**
     * ModelHasRole constructor.
     *
     * @param ModelHasRole $modelHasRole
     */
    public function __construct(ModelHasRole $modelHasRole)
    {
        $this->modelHasRole = $modelHasRole;
    }

    /**
     * Get all modelHasRole.
     *
     * @return ModelHasRole $modelHasRole
     */
    public function all()
    {
        return $this->modelHasRole->get();
    }

     /**
     * Get modelHasRole by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->modelHasRole->find($id);
    }

    /**
     * Save ModelHasRole
     *
     * @param $data
     * @return ModelHasRole
     */
     public function save(array $data)
    {
        return ModelHasRole::create($data);
    }

     /**
     * Update ModelHasRole
     *
     * @param $data
     * @return ModelHasRole
     */
    public function update(array $data, int $id)
    {
        $modelHasRole = $this->modelHasRole->find($id);
        $modelHasRole->update($data);
        return $modelHasRole;
    }

    /**
     * Delete ModelHasRole
     *
     * @param $data
     * @return ModelHasRole
     */
   	 public function delete(int $id)
    {
        $modelHasRole = $this->modelHasRole->find($id);
        $modelHasRole->delete();
        return $modelHasRole;
    }
}
