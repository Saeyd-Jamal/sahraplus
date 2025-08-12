<?php
namespace App\Repositories;

use App\Models\Device;

class DeviceRepository
{
	 /**
     * @var Device
     */
    protected Device $device;

    /**
     * Device constructor.
     *
     * @param Device $device
     */
    public function __construct(Device $device)
    {
        $this->device = $device;
    }

    /**
     * Get all device.
     *
     * @return Device $device
     */
    public function all()
    {
        return $this->device->get();
    }

     /**
     * Get device by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->device->find($id);
    }

    /**
     * Save Device
     *
     * @param $data
     * @return Device
     */
     public function save(array $data)
    {
        return Device::create($data);
    }

     /**
     * Update Device
     *
     * @param $data
     * @return Device
     */
    public function update(array $data, int $id)
    {
        $device = $this->device->find($id);
        $device->update($data);
        return $device;
    }

    /**
     * Delete Device
     *
     * @param $data
     * @return Device
     */
   	 public function delete(int $id)
    {
        $device = $this->device->find($id);
        $device->delete();
        return $device;
    }
}
