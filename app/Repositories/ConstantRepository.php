<?php
namespace App\Repositories;

use App\Models\Constant;

class ConstantRepository
{
	 /**
     * @var Constant
     */
    protected Constant $constant;

    /**
     * Constant constructor.
     *
     * @param Constant $constant
     */
    public function __construct(Constant $constant)
    {
        $this->constant = $constant;
    }

    /**
     * Get all constant.
     *
     * @return Constant $constant
     */
    public function all()
    {
        return $this->constant->get();
    }

     /**
     * Get constant by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->constant->find($id);
    }

    /**
     * Save Constant
     *
     * @param $data
     * @return Constant
     */
     public function save(array $data)
    {
        return Constant::create($data);
    }

     /**
     * Update Constant
     *
     * @param $data
     * @return Constant
     */
    public function update(array $data, int $id)
    {
        $constant = $this->constant->find($id);
        $constant->update($data);
        return $constant;
    }

    /**
     * Delete Constant
     *
     * @param $data
     * @return Constant
     */
   	 public function delete(int $id)
    {
        $constant = $this->constant->find($id);
        $constant->delete();
        return $constant;
    }
}
