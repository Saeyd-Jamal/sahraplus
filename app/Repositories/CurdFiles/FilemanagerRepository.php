<?php
namespace App\Repositories;

use App\Models\Filemanager;

class FilemanagerRepository
{
	 /**
     * @var Filemanager
     */
    protected Filemanager $filemanager;

    /**
     * Filemanager constructor.
     *
     * @param Filemanager $filemanager
     */
    public function __construct(Filemanager $filemanager)
    {
        $this->filemanager = $filemanager;
    }

    /**
     * Get all filemanager.
     *
     * @return Filemanager $filemanager
     */
    public function all()
    {
        return $this->filemanager->get();
    }

     /**
     * Get filemanager by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->filemanager->find($id);
    }

    /**
     * Save Filemanager
     *
     * @param $data
     * @return Filemanager
     */
     public function save(array $data)
    {
        return Filemanager::create($data);
    }

     /**
     * Update Filemanager
     *
     * @param $data
     * @return Filemanager
     */
    public function update(array $data, int $id)
    {
        $filemanager = $this->filemanager->find($id);
        $filemanager->update($data);
        return $filemanager;
    }

    /**
     * Delete Filemanager
     *
     * @param $data
     * @return Filemanager
     */
   	 public function delete(int $id)
    {
        $filemanager = $this->filemanager->find($id);
        $filemanager->delete();
        return $filemanager;
    }
}
