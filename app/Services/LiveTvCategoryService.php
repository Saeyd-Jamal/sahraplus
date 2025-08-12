<?php
namespace App\Services;

use App\Models\LiveTvCategory;
use App\Repositories\LiveTvCategoryRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class LiveTvCategoryService
{
	/**
     * @var LiveTvCategoryRepository $liveTvCategoryRepository
     */
    protected $liveTvCategoryRepository;

    /**
     * DummyClass constructor.
     *
     * @param LiveTvCategoryRepository $liveTvCategoryRepository
     */
    public function __construct(LiveTvCategoryRepository $liveTvCategoryRepository)
    {
        $this->liveTvCategoryRepository = $liveTvCategoryRepository;
    }

    /**
     * Get all liveTvCategoryRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->liveTvCategoryRepository->all();
    }

    /**
     * Get liveTvCategoryRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->liveTvCategoryRepository->getById($id);
    }

    /**
     * Validate liveTvCategoryRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->liveTvCategoryRepository->save($data);
    }

    /**
     * Update liveTvCategoryRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $liveTvCategoryRepository = $this->liveTvCategoryRepository->update($data, $id);
            DB::commit();
            return $liveTvCategoryRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete liveTvCategoryRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $liveTvCategoryRepository = $this->liveTvCategoryRepository->delete($id);
            DB::commit();
            return $liveTvCategoryRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
