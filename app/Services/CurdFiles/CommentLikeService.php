<?php
namespace App\Services;

use App\Models\CommentLike;
use App\Repositories\CommentLikeRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class CommentLikeService
{
	/**
     * @var CommentLikeRepository $commentLikeRepository
     */
    protected $commentLikeRepository;

    /**
     * DummyClass constructor.
     *
     * @param CommentLikeRepository $commentLikeRepository
     */
    public function __construct(CommentLikeRepository $commentLikeRepository)
    {
        $this->commentLikeRepository = $commentLikeRepository;
    }

    /**
     * Get all commentLikeRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->commentLikeRepository->all();
    }

    /**
     * Get commentLikeRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->commentLikeRepository->getById($id);
    }

    /**
     * Validate commentLikeRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->commentLikeRepository->save($data);
    }

    /**
     * Update commentLikeRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $commentLikeRepository = $this->commentLikeRepository->update($data, $id);
            DB::commit();
            return $commentLikeRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete commentLikeRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $commentLikeRepository = $this->commentLikeRepository->delete($id);
            DB::commit();
            return $commentLikeRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
