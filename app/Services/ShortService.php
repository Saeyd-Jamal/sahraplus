<?php
namespace App\Services;

use App\Models\Short;
use App\Repositories\ShortRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class ShortService
{
	/**
     * @var ShortRepository $shortRepository
     */
    protected $shortRepository;

    /**
     * DummyClass constructor.
     *
     * @param ShortRepository $shortRepository
     */
    public function __construct(ShortRepository $shortRepository)
    {
        $this->shortRepository = $shortRepository;
    }

    /**
     * Get all shortRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->shortRepository->all();
    }

    /**
     * Get shortRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->shortRepository->getById($id);
    }

    /**
     * Validate shortRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->shortRepository->save($data);
    }

    /**
     * Update shortRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $shortRepository = $this->shortRepository->update($data, $id);
            DB::commit();
            return $shortRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete shortRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $shortRepository = $this->shortRepository->delete($id);
            DB::commit();
            return $shortRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
