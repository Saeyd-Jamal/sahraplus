<?php
namespace App\Repositories;

use App\Models\Installer;

class InstallerRepository
{
	 /**
     * @var Installer
     */
    protected Installer $installer;

    /**
     * Installer constructor.
     *
     * @param Installer $installer
     */
    public function __construct(Installer $installer)
    {
        $this->installer = $installer;
    }

    /**
     * Get all installer.
     *
     * @return Installer $installer
     */
    public function all()
    {
        return $this->installer->get();
    }

     /**
     * Get installer by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->installer->find($id);
    }

    /**
     * Save Installer
     *
     * @param $data
     * @return Installer
     */
     public function save(array $data)
    {
        return Installer::create($data);
    }

     /**
     * Update Installer
     *
     * @param $data
     * @return Installer
     */
    public function update(array $data, int $id)
    {
        $installer = $this->installer->find($id);
        $installer->update($data);
        return $installer;
    }

    /**
     * Delete Installer
     *
     * @param $data
     * @return Installer
     */
   	 public function delete(int $id)
    {
        $installer = $this->installer->find($id);
        $installer->delete();
        return $installer;
    }
}
