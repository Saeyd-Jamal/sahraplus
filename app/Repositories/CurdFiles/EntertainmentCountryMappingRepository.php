<?php
namespace App\Repositories;

use App\Models\EntertainmentCountryMapping;

class EntertainmentCountryMappingRepository
{
	 /**
     * @var EntertainmentCountryMapping
     */
    protected EntertainmentCountryMapping $entertainmentCountryMapping;

    /**
     * EntertainmentCountryMapping constructor.
     *
     * @param EntertainmentCountryMapping $entertainmentCountryMapping
     */
    public function __construct(EntertainmentCountryMapping $entertainmentCountryMapping)
    {
        $this->entertainmentCountryMapping = $entertainmentCountryMapping;
    }

    /**
     * Get all entertainmentCountryMapping.
     *
     * @return EntertainmentCountryMapping $entertainmentCountryMapping
     */
    public function all()
    {
        return $this->entertainmentCountryMapping->get();
    }

     /**
     * Get entertainmentCountryMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->entertainmentCountryMapping->find($id);
    }

    /**
     * Save EntertainmentCountryMapping
     *
     * @param $data
     * @return EntertainmentCountryMapping
     */
     public function save(array $data)
    {
        return EntertainmentCountryMapping::create($data);
    }

     /**
     * Update EntertainmentCountryMapping
     *
     * @param $data
     * @return EntertainmentCountryMapping
     */
    public function update(array $data, int $id)
    {
        $entertainmentCountryMapping = $this->entertainmentCountryMapping->find($id);
        $entertainmentCountryMapping->update($data);
        return $entertainmentCountryMapping;
    }

    /**
     * Delete EntertainmentCountryMapping
     *
     * @param $data
     * @return EntertainmentCountryMapping
     */
   	 public function delete(int $id)
    {
        $entertainmentCountryMapping = $this->entertainmentCountryMapping->find($id);
        $entertainmentCountryMapping->delete();
        return $entertainmentCountryMapping;
    }
}
