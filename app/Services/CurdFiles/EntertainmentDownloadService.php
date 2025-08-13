<?php
namespace App\Services;

use App\Models\EntertainmentDownload;
use App\Repositories\EntertainmentDownloadRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class EntertainmentDownloadService
{
	/**
     * @var EntertainmentDownloadRepository $entertainmentDownloadRepository
     */
    protected $entertainmentDownloadRepository;

    /**
     * DummyClass constructor.
     *
     * @param EntertainmentDownloadRepository $entertainmentDownloadRepository
     */
    public function __construct(EntertainmentDownloadRepository $entertainmentDownloadRepository)
    {
        $this->entertainmentDownloadRepository = $entertainmentDownloadRepository;
    }

    /**
     * Get all entertainmentDownloadRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->entertainmentDownloadRepository->all();
    }

    /**
     * Get entertainmentDownloadRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->entertainmentDownloadRepository->getById($id);
    }

    /**
     * Validate entertainmentDownloadRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->entertainmentDownloadRepository->save($data);
    }

    /**
     * Update entertainmentDownloadRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentDownloadRepository = $this->entertainmentDownloadRepository->update($data, $id);
            DB::commit();
            return $entertainmentDownloadRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete entertainmentDownloadRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $entertainmentDownloadRepository = $this->entertainmentDownloadRepository->delete($id);
            DB::commit();
            return $entertainmentDownloadRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
