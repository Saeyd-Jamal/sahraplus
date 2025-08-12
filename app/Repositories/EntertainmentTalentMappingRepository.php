<?php
namespace App\Repositories;

use App\Models\EntertainmentTalentMapping;

class EntertainmentTalentMappingRepository
{
	 /**
     * @var EntertainmentTalentMapping
     */
    protected EntertainmentTalentMapping $entertainmentTalentMapping;

    /**
     * EntertainmentTalentMapping constructor.
     *
     * @param EntertainmentTalentMapping $entertainmentTalentMapping
     */
    public function __construct(EntertainmentTalentMapping $entertainmentTalentMapping)
    {
        $this->entertainmentTalentMapping = $entertainmentTalentMapping;
    }

    /**
     * Get all entertainmentTalentMapping.
     *
     * @return EntertainmentTalentMapping $entertainmentTalentMapping
     */
    public function all()
    {
        return $this->entertainmentTalentMapping->get();
    }

     /**
     * Get entertainmentTalentMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->entertainmentTalentMapping->find($id);
    }

    /**
     * Save EntertainmentTalentMapping
     *
     * @param $data
     * @return EntertainmentTalentMapping
     */
     public function save(array $data)
    {
        return EntertainmentTalentMapping::create($data);
    }

     /**
     * Update EntertainmentTalentMapping
     *
     * @param $data
     * @return EntertainmentTalentMapping
     */
    public function update(array $data, int $id)
    {
        $entertainmentTalentMapping = $this->entertainmentTalentMapping->find($id);
        $entertainmentTalentMapping->update($data);
        return $entertainmentTalentMapping;
    }

    /**
     * Delete EntertainmentTalentMapping
     *
     * @param $data
     * @return EntertainmentTalentMapping
     */
   	 public function delete(int $id)
    {
        $entertainmentTalentMapping = $this->entertainmentTalentMapping->find($id);
        $entertainmentTalentMapping->delete();
        return $entertainmentTalentMapping;
    }
}
