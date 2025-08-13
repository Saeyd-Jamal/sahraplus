<?php
namespace App\Repositories;

use App\Models\Country;

class CountryRepository
{
	 /**
     * @var Country
     */
    protected Country $country;

    /**
     * Country constructor.
     *
     * @param Country $country
     */
    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    /**
     * Get all country.
     *
     * @return Country $country
     */
    public function all()
    {
        return $this->country->get();
    }

     /**
     * Get country by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->country->find($id);
    }

    /**
     * Save Country
     *
     * @param $data
     * @return Country
     */
     public function save(array $data)
    {
        return Country::create($data);
    }

     /**
     * Update Country
     *
     * @param $data
     * @return Country
     */
    public function update(array $data, int $id)
    {
        $country = $this->country->find($id);
        $country->update($data);
        return $country;
    }

    /**
     * Delete Country
     *
     * @param $data
     * @return Country
     */
   	 public function delete(int $id)
    {
        $country = $this->country->find($id);
        $country->delete();
        return $country;
    }
}
