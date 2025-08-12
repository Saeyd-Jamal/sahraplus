<?php
namespace App\Services;

use App\Models\Review;
use App\Repositories\ReviewRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class ReviewService
{
	/**
     * @var ReviewRepository $reviewRepository
     */
    protected $reviewRepository;

    /**
     * DummyClass constructor.
     *
     * @param ReviewRepository $reviewRepository
     */
    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * Get all reviewRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->reviewRepository->all();
    }

    /**
     * Get reviewRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->reviewRepository->getById($id);
    }

    /**
     * Validate reviewRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->reviewRepository->save($data);
    }

    /**
     * Update reviewRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $reviewRepository = $this->reviewRepository->update($data, $id);
            DB::commit();
            return $reviewRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete reviewRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $reviewRepository = $this->reviewRepository->delete($id);
            DB::commit();
            return $reviewRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
