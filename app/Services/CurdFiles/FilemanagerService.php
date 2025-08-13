<?php
namespace App\Services;

use App\Models\Filemanager;
use App\Repositories\FilemanagerRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class FilemanagerService
{
	/**
     * @var FilemanagerRepository $filemanagerRepository
     */
    protected $filemanagerRepository;

    /**
     * DummyClass constructor.
     *
     * @param FilemanagerRepository $filemanagerRepository
     */
    public function __construct(FilemanagerRepository $filemanagerRepository)
    {
        $this->filemanagerRepository = $filemanagerRepository;
    }

    /**
     * Get all filemanagerRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->filemanagerRepository->all();
    }

    /**
     * Get filemanagerRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->filemanagerRepository->getById($id);
    }

    /**
     * Validate filemanagerRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->filemanagerRepository->save($data);
    }

    /**
     * Update filemanagerRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $filemanagerRepository = $this->filemanagerRepository->update($data, $id);
            DB::commit();
            return $filemanagerRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete filemanagerRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $filemanagerRepository = $this->filemanagerRepository->delete($id);
            DB::commit();
            return $filemanagerRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
