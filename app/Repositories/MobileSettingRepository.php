<?php
namespace App\Repositories;

use App\Models\MobileSetting;

class MobileSettingRepository
{
	 /**
     * @var MobileSetting
     */
    protected MobileSetting $mobileSetting;

    /**
     * MobileSetting constructor.
     *
     * @param MobileSetting $mobileSetting
     */
    public function __construct(MobileSetting $mobileSetting)
    {
        $this->mobileSetting = $mobileSetting;
    }

    /**
     * Get all mobileSetting.
     *
     * @return MobileSetting $mobileSetting
     */
    public function all()
    {
        return $this->mobileSetting->get();
    }

     /**
     * Get mobileSetting by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->mobileSetting->find($id);
    }

    /**
     * Save MobileSetting
     *
     * @param $data
     * @return MobileSetting
     */
     public function save(array $data)
    {
        return MobileSetting::create($data);
    }

     /**
     * Update MobileSetting
     *
     * @param $data
     * @return MobileSetting
     */
    public function update(array $data, int $id)
    {
        $mobileSetting = $this->mobileSetting->find($id);
        $mobileSetting->update($data);
        return $mobileSetting;
    }

    /**
     * Delete MobileSetting
     *
     * @param $data
     * @return MobileSetting
     */
   	 public function delete(int $id)
    {
        $mobileSetting = $this->mobileSetting->find($id);
        $mobileSetting->delete();
        return $mobileSetting;
    }
}
