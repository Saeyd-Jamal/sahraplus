<?php
namespace App\Repositories;

use App\Models\City;

class CityRepository
{
	 /**
     * @var City
     */
    protected City $city;

    /**
     * City constructor.
     *
     * @param City $city
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * Get all city.
     *
     * @return City $city
     */
    public function all()
    {
        return $this->city->get();
    }

     /**
     * Get city by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->city->find($id);
    }

    /**
     * Save City
     *
     * @param $data
     * @return City
     */
     public function save(array $data)
    {
        return City::create($data);
    }

     /**
     * Update City
     *
     * @param $data
     * @return City
     */
    public function update(array $data, int $id)
    {
        $city = $this->city->find($id);
        $city->update($data);
        return $city;
    }

    /**
     * Delete City
     *
     * @param $data
     * @return City
     */
   	 public function delete(int $id)
    {
        $city = $this->city->find($id);
        $city->delete();
        return $city;
    }
}
