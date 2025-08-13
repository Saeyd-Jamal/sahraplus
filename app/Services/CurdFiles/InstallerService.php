<?php
namespace App\Services;

use App\Models\Installer;
use App\Repositories\InstallerRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class InstallerService
{
	/**
     * @var InstallerRepository $installerRepository
     */
    protected $installerRepository;

    /**
     * DummyClass constructor.
     *
     * @param InstallerRepository $installerRepository
     */
    public function __construct(InstallerRepository $installerRepository)
    {
        $this->installerRepository = $installerRepository;
    }

    /**
     * Get all installerRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->installerRepository->all();
    }

    /**
     * Get installerRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->installerRepository->getById($id);
    }

    /**
     * Validate installerRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->installerRepository->save($data);
    }

    /**
     * Update installerRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $installerRepository = $this->installerRepository->update($data, $id);
            DB::commit();
            return $installerRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete installerRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $installerRepository = $this->installerRepository->delete($id);
            DB::commit();
            return $installerRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
