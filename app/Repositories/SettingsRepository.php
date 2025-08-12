<?php
namespace App\Repositories;

use App\Models\Settings;

class SettingsRepository
{
	 /**
     * @var Settings
     */
    protected Settings $settings;

    /**
     * Settings constructor.
     *
     * @param Settings $settings
     */
    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Get all settings.
     *
     * @return Settings $settings
     */
    public function all()
    {
        return $this->settings->get();
    }

     /**
     * Get settings by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->settings->find($id);
    }

    /**
     * Save Settings
     *
     * @param $data
     * @return Settings
     */
     public function save(array $data)
    {
        return Settings::create($data);
    }

     /**
     * Update Settings
     *
     * @param $data
     * @return Settings
     */
    public function update(array $data, int $id)
    {
        $settings = $this->settings->find($id);
        $settings->update($data);
        return $settings;
    }

    /**
     * Delete Settings
     *
     * @param $data
     * @return Settings
     */
   	 public function delete(int $id)
    {
        $settings = $this->settings->find($id);
        $settings->delete();
        return $settings;
    }
}
