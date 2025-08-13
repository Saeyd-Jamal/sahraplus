<?php
namespace App\Services;

use App\Models\Settings;
use App\Repositories\SettingsRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class SettingsService
{
	/**
     * @var SettingsRepository $settingsRepository
     */
    protected $settingsRepository;

    /**
     * DummyClass constructor.
     *
     * @param SettingsRepository $settingsRepository
     */
    public function __construct(SettingsRepository $settingsRepository)
    {
        $this->settingsRepository = $settingsRepository;
    }

    /**
     * Get all settingsRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->settingsRepository->all();
    }

    /**
     * Get settingsRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->settingsRepository->getById($id);
    }

    /**
     * Validate settingsRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->settingsRepository->save($data);
    }

    /**
     * Update settingsRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $settingsRepository = $this->settingsRepository->update($data, $id);
            DB::commit();
            return $settingsRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete settingsRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $settingsRepository = $this->settingsRepository->delete($id);
            DB::commit();
            return $settingsRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
