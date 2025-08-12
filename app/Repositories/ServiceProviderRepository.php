<?php
namespace App\Repositories;

use App\Models\ServiceProvider;

class ServiceProviderRepository
{
	 /**
     * @var ServiceProvider
     */
    protected ServiceProvider $serviceProvider;

    /**
     * ServiceProvider constructor.
     *
     * @param ServiceProvider $serviceProvider
     */
    public function __construct(ServiceProvider $serviceProvider)
    {
        $this->serviceProvider = $serviceProvider;
    }

    /**
     * Get all serviceProvider.
     *
     * @return ServiceProvider $serviceProvider
     */
    public function all()
    {
        return $this->serviceProvider->get();
    }

     /**
     * Get serviceProvider by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->serviceProvider->find($id);
    }

    /**
     * Save ServiceProvider
     *
     * @param $data
     * @return ServiceProvider
     */
     public function save(array $data)
    {
        return ServiceProvider::create($data);
    }

     /**
     * Update ServiceProvider
     *
     * @param $data
     * @return ServiceProvider
     */
    public function update(array $data, int $id)
    {
        $serviceProvider = $this->serviceProvider->find($id);
        $serviceProvider->update($data);
        return $serviceProvider;
    }

    /**
     * Delete ServiceProvider
     *
     * @param $data
     * @return ServiceProvider
     */
   	 public function delete(int $id)
    {
        $serviceProvider = $this->serviceProvider->find($id);
        $serviceProvider->delete();
        return $serviceProvider;
    }
}
