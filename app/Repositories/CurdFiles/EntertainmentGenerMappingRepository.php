<?php
namespace App\Repositories;

use App\Models\EntertainmentGenerMapping;

class EntertainmentGenerMappingRepository
{
	 /**
     * @var EntertainmentGenerMapping
     */
    protected EntertainmentGenerMapping $entertainmentGenerMapping;

    /**
     * EntertainmentGenerMapping constructor.
     *
     * @param EntertainmentGenerMapping $entertainmentGenerMapping
     */
    public function __construct(EntertainmentGenerMapping $entertainmentGenerMapping)
    {
        $this->entertainmentGenerMapping = $entertainmentGenerMapping;
    }

    /**
     * Get all entertainmentGenerMapping.
     *
     * @return EntertainmentGenerMapping $entertainmentGenerMapping
     */
    public function all()
    {
        return $this->entertainmentGenerMapping->get();
    }

     /**
     * Get entertainmentGenerMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->entertainmentGenerMapping->find($id);
    }

    /**
     * Save EntertainmentGenerMapping
     *
     * @param $data
     * @return EntertainmentGenerMapping
     */
     public function save(array $data)
    {
        return EntertainmentGenerMapping::create($data);
    }

     /**
     * Update EntertainmentGenerMapping
     *
     * @param $data
     * @return EntertainmentGenerMapping
     */
    public function update(array $data, int $id)
    {
        $entertainmentGenerMapping = $this->entertainmentGenerMapping->find($id);
        $entertainmentGenerMapping->update($data);
        return $entertainmentGenerMapping;
    }

    /**
     * Delete EntertainmentGenerMapping
     *
     * @param $data
     * @return EntertainmentGenerMapping
     */
   	 public function delete(int $id)
    {
        $entertainmentGenerMapping = $this->entertainmentGenerMapping->find($id);
        $entertainmentGenerMapping->delete();
        return $entertainmentGenerMapping;
    }
}
