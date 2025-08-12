<?php
namespace App\Repositories;

use App\Models\CommentLike;

class CommentLikeRepository
{
	 /**
     * @var CommentLike
     */
    protected CommentLike $commentLike;

    /**
     * CommentLike constructor.
     *
     * @param CommentLike $commentLike
     */
    public function __construct(CommentLike $commentLike)
    {
        $this->commentLike = $commentLike;
    }

    /**
     * Get all commentLike.
     *
     * @return CommentLike $commentLike
     */
    public function all()
    {
        return $this->commentLike->get();
    }

     /**
     * Get commentLike by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->commentLike->find($id);
    }

    /**
     * Save CommentLike
     *
     * @param $data
     * @return CommentLike
     */
     public function save(array $data)
    {
        return CommentLike::create($data);
    }

     /**
     * Update CommentLike
     *
     * @param $data
     * @return CommentLike
     */
    public function update(array $data, int $id)
    {
        $commentLike = $this->commentLike->find($id);
        $commentLike->update($data);
        return $commentLike;
    }

    /**
     * Delete CommentLike
     *
     * @param $data
     * @return CommentLike
     */
   	 public function delete(int $id)
    {
        $commentLike = $this->commentLike->find($id);
        $commentLike->delete();
        return $commentLike;
    }
}
