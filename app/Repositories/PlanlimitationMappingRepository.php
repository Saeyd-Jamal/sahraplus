<?php
namespace App\Repositories;

use App\Models\PlanlimitationMapping;

class PlanlimitationMappingRepository
{
	 /**
     * @var PlanlimitationMapping
     */
    protected PlanlimitationMapping $planlimitationMapping;

    /**
     * PlanlimitationMapping constructor.
     *
     * @param PlanlimitationMapping $planlimitationMapping
     */
    public function __construct(PlanlimitationMapping $planlimitationMapping)
    {
        $this->planlimitationMapping = $planlimitationMapping;
    }

    /**
     * Get all planlimitationMapping.
     *
     * @return PlanlimitationMapping $planlimitationMapping
     */
    public function all()
    {
        return $this->planlimitationMapping->get();
    }

     /**
     * Get planlimitationMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->planlimitationMapping->find($id);
    }

    /**
     * Save PlanlimitationMapping
     *
     * @param $data
     * @return PlanlimitationMapping
     */
     public function save(array $data)
    {
        return PlanlimitationMapping::create($data);
    }

     /**
     * Update PlanlimitationMapping
     *
     * @param $data
     * @return PlanlimitationMapping
     */
    public function update(array $data, int $id)
    {
        $planlimitationMapping = $this->planlimitationMapping->find($id);
        $planlimitationMapping->update($data);
        return $planlimitationMapping;
    }

    /**
     * Delete PlanlimitationMapping
     *
     * @param $data
     * @return PlanlimitationMapping
     */
   	 public function delete(int $id)
    {
        $planlimitationMapping = $this->planlimitationMapping->find($id);
        $planlimitationMapping->delete();
        return $planlimitationMapping;
    }
}
