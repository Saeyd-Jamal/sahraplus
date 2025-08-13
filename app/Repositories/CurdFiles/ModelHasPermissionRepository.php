<?php
namespace App\Repositories;

use App\Models\ModelHasPermission;

class ModelHasPermissionRepository
{
	 /**
     * @var ModelHasPermission
     */
    protected ModelHasPermission $modelHasPermission;

    /**
     * ModelHasPermission constructor.
     *
     * @param ModelHasPermission $modelHasPermission
     */
    public function __construct(ModelHasPermission $modelHasPermission)
    {
        $this->modelHasPermission = $modelHasPermission;
    }

    /**
     * Get all modelHasPermission.
     *
     * @return ModelHasPermission $modelHasPermission
     */
    public function all()
    {
        return $this->modelHasPermission->get();
    }

     /**
     * Get modelHasPermission by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->modelHasPermission->find($id);
    }

    /**
     * Save ModelHasPermission
     *
     * @param $data
     * @return ModelHasPermission
     */
     public function save(array $data)
    {
        return ModelHasPermission::create($data);
    }

     /**
     * Update ModelHasPermission
     *
     * @param $data
     * @return ModelHasPermission
     */
    public function update(array $data, int $id)
    {
        $modelHasPermission = $this->modelHasPermission->find($id);
        $modelHasPermission->update($data);
        return $modelHasPermission;
    }

    /**
     * Delete ModelHasPermission
     *
     * @param $data
     * @return ModelHasPermission
     */
   	 public function delete(int $id)
    {
        $modelHasPermission = $this->modelHasPermission->find($id);
        $modelHasPermission->delete();
        return $modelHasPermission;
    }
}
