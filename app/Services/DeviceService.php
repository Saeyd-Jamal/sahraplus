<?php
namespace App\Services;

use App\Models\Device;
use App\Repositories\DeviceRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class DeviceService
{
	/**
     * @var DeviceRepository $deviceRepository
     */
    protected $deviceRepository;

    /**
     * DummyClass constructor.
     *
     * @param DeviceRepository $deviceRepository
     */
    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    /**
     * Get all deviceRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->deviceRepository->all();
    }

    /**
     * Get deviceRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->deviceRepository->getById($id);
    }

    /**
     * Validate deviceRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->deviceRepository->save($data);
    }

    /**
     * Update deviceRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $deviceRepository = $this->deviceRepository->update($data, $id);
            DB::commit();
            return $deviceRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete deviceRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $deviceRepository = $this->deviceRepository->delete($id);
            DB::commit();
            return $deviceRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
