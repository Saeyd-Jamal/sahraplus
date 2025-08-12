<?php
namespace App\Repositories;

use App\Models\Taxe;

class TaxeRepository
{
	 /**
     * @var Taxe
     */
    protected Taxe $taxe;

    /**
     * Taxe constructor.
     *
     * @param Taxe $taxe
     */
    public function __construct(Taxe $taxe)
    {
        $this->taxe = $taxe;
    }

    /**
     * Get all taxe.
     *
     * @return Taxe $taxe
     */
    public function all()
    {
        return $this->taxe->get();
    }

     /**
     * Get taxe by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->taxe->find($id);
    }

    /**
     * Save Taxe
     *
     * @param $data
     * @return Taxe
     */
     public function save(array $data)
    {
        return Taxe::create($data);
    }

     /**
     * Update Taxe
     *
     * @param $data
     * @return Taxe
     */
    public function update(array $data, int $id)
    {
        $taxe = $this->taxe->find($id);
        $taxe->update($data);
        return $taxe;
    }

    /**
     * Delete Taxe
     *
     * @param $data
     * @return Taxe
     */
   	 public function delete(int $id)
    {
        $taxe = $this->taxe->find($id);
        $taxe->delete();
        return $taxe;
    }
}
