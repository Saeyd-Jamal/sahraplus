<?php
namespace App\Services;

use App\Models\Like;
use App\Repositories\LikeRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class LikeService
{
	/**
     * @var LikeRepository $likeRepository
     */
    protected $likeRepository;

    /**
     * DummyClass constructor.
     *
     * @param LikeRepository $likeRepository
     */
    public function __construct(LikeRepository $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    /**
     * Get all likeRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->likeRepository->all();
    }

    /**
     * Get likeRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->likeRepository->getById($id);
    }

    /**
     * Validate likeRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->likeRepository->save($data);
    }

    /**
     * Update likeRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $likeRepository = $this->likeRepository->update($data, $id);
            DB::commit();
            return $likeRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete likeRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $likeRepository = $this->likeRepository->delete($id);
            DB::commit();
            return $likeRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
