<?php
namespace App\Services;

use App\Models\ServiceProvider;
use App\Repositories\ServiceProviderRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class ServiceProviderService
{
	/**
     * @var ServiceProviderRepository $serviceProviderRepository
     */
    protected $serviceProviderRepository;

    /**
     * DummyClass constructor.
     *
     * @param ServiceProviderRepository $serviceProviderRepository
     */
    public function __construct(ServiceProviderRepository $serviceProviderRepository)
    {
        $this->serviceProviderRepository = $serviceProviderRepository;
    }

    /**
     * Get all serviceProviderRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->serviceProviderRepository->all();
    }

    /**
     * Get serviceProviderRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->serviceProviderRepository->getById($id);
    }

    /**
     * Validate serviceProviderRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->serviceProviderRepository->save($data);
    }

    /**
     * Update serviceProviderRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $serviceProviderRepository = $this->serviceProviderRepository->update($data, $id);
            DB::commit();
            return $serviceProviderRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete serviceProviderRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $serviceProviderRepository = $this->serviceProviderRepository->delete($id);
            DB::commit();
            return $serviceProviderRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
