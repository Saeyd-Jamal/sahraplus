<?php
namespace App\Repositories;

use App\Models\EntertainmentStreamContentMapping;

class EntertainmentStreamContentMappingRepository
{
	 /**
     * @var EntertainmentStreamContentMapping
     */
    protected EntertainmentStreamContentMapping $entertainmentStreamContentMapping;

    /**
     * EntertainmentStreamContentMapping constructor.
     *
     * @param EntertainmentStreamContentMapping $entertainmentStreamContentMapping
     */
    public function __construct(EntertainmentStreamContentMapping $entertainmentStreamContentMapping)
    {
        $this->entertainmentStreamContentMapping = $entertainmentStreamContentMapping;
    }

    /**
     * Get all entertainmentStreamContentMapping.
     *
     * @return EntertainmentStreamContentMapping $entertainmentStreamContentMapping
     */
    public function all()
    {
        return $this->entertainmentStreamContentMapping->get();
    }

     /**
     * Get entertainmentStreamContentMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->entertainmentStreamContentMapping->find($id);
    }

    /**
     * Save EntertainmentStreamContentMapping
     *
     * @param $data
     * @return EntertainmentStreamContentMapping
     */
     public function save(array $data)
    {
        return EntertainmentStreamContentMapping::create($data);
    }

     /**
     * Update EntertainmentStreamContentMapping
     *
     * @param $data
     * @return EntertainmentStreamContentMapping
     */
    public function update(array $data, int $id)
    {
        $entertainmentStreamContentMapping = $this->entertainmentStreamContentMapping->find($id);
        $entertainmentStreamContentMapping->update($data);
        return $entertainmentStreamContentMapping;
    }

    /**
     * Delete EntertainmentStreamContentMapping
     *
     * @param $data
     * @return EntertainmentStreamContentMapping
     */
   	 public function delete(int $id)
    {
        $entertainmentStreamContentMapping = $this->entertainmentStreamContentMapping->find($id);
        $entertainmentStreamContentMapping->delete();
        return $entertainmentStreamContentMapping;
    }
}
