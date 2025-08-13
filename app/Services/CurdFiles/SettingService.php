<?php
namespace App\Services;

use App\Models\Setting;
use App\Repositories\SettingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class SettingService
{
	/**
     * @var SettingRepository $settingRepository
     */
    protected $settingRepository;

    /**
     * DummyClass constructor.
     *
     * @param SettingRepository $settingRepository
     */
    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * Get all settingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->settingRepository->all();
    }

    /**
     * Get settingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->settingRepository->getById($id);
    }

    /**
     * Validate settingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->settingRepository->save($data);
    }

    /**
     * Update settingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $settingRepository = $this->settingRepository->update($data, $id);
            DB::commit();
            return $settingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete settingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $settingRepository = $this->settingRepository->delete($id);
            DB::commit();
            return $settingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
