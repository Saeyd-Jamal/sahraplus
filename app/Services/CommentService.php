<?php
namespace App\Services;

use App\Models\Comment;
use App\Repositories\CommentRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class CommentService
{
	/**
     * @var CommentRepository $commentRepository
     */
    protected $commentRepository;

    /**
     * DummyClass constructor.
     *
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Get all commentRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->commentRepository->all();
    }

    /**
     * Get commentRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->commentRepository->getById($id);
    }

    /**
     * Validate commentRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->commentRepository->save($data);
    }

    /**
     * Update commentRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $commentRepository = $this->commentRepository->update($data, $id);
            DB::commit();
            return $commentRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete commentRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $commentRepository = $this->commentRepository->delete($id);
            DB::commit();
            return $commentRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
