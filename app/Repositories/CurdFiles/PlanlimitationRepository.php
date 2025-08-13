<?php
namespace App\Repositories;

use App\Models\Planlimitation;

class PlanlimitationRepository
{
	 /**
     * @var Planlimitation
     */
    protected Planlimitation $planlimitation;

    /**
     * Planlimitation constructor.
     *
     * @param Planlimitation $planlimitation
     */
    public function __construct(Planlimitation $planlimitation)
    {
        $this->planlimitation = $planlimitation;
    }

    /**
     * Get all planlimitation.
     *
     * @return Planlimitation $planlimitation
     */
    public function all()
    {
        return $this->planlimitation->get();
    }

     /**
     * Get planlimitation by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->planlimitation->find($id);
    }

    /**
     * Save Planlimitation
     *
     * @param $data
     * @return Planlimitation
     */
     public function save(array $data)
    {
        return Planlimitation::create($data);
    }

     /**
     * Update Planlimitation
     *
     * @param $data
     * @return Planlimitation
     */
    public function update(array $data, int $id)
    {
        $planlimitation = $this->planlimitation->find($id);
        $planlimitation->update($data);
        return $planlimitation;
    }

    /**
     * Delete Planlimitation
     *
     * @param $data
     * @return Planlimitation
     */
   	 public function delete(int $id)
    {
        $planlimitation = $this->planlimitation->find($id);
        $planlimitation->delete();
        return $planlimitation;
    }
}
