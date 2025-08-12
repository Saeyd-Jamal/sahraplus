<?php
namespace App\Repositories;

use App\Models\Setting;

class SettingRepository
{
	 /**
     * @var Setting
     */
    protected Setting $setting;

    /**
     * Setting constructor.
     *
     * @param Setting $setting
     */
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    /**
     * Get all setting.
     *
     * @return Setting $setting
     */
    public function all()
    {
        return $this->setting->get();
    }

     /**
     * Get setting by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->setting->find($id);
    }

    /**
     * Save Setting
     *
     * @param $data
     * @return Setting
     */
     public function save(array $data)
    {
        return Setting::create($data);
    }

     /**
     * Update Setting
     *
     * @param $data
     * @return Setting
     */
    public function update(array $data, int $id)
    {
        $setting = $this->setting->find($id);
        $setting->update($data);
        return $setting;
    }

    /**
     * Delete Setting
     *
     * @param $data
     * @return Setting
     */
   	 public function delete(int $id)
    {
        $setting = $this->setting->find($id);
        $setting->delete();
        return $setting;
    }
}
