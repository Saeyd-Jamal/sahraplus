<?php
namespace App\Repositories;

use App\Models\Like;

class LikeRepository
{
	 /**
     * @var Like
     */
    protected Like $like;

    /**
     * Like constructor.
     *
     * @param Like $like
     */
    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    /**
     * Get all like.
     *
     * @return Like $like
     */
    public function all()
    {
        return $this->like->get();
    }

     /**
     * Get like by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->like->find($id);
    }

    /**
     * Save Like
     *
     * @param $data
     * @return Like
     */
     public function save(array $data)
    {
        return Like::create($data);
    }

     /**
     * Update Like
     *
     * @param $data
     * @return Like
     */
    public function update(array $data, int $id)
    {
        $like = $this->like->find($id);
        $like->update($data);
        return $like;
    }

    /**
     * Delete Like
     *
     * @param $data
     * @return Like
     */
   	 public function delete(int $id)
    {
        $like = $this->like->find($id);
        $like->delete();
        return $like;
    }
}
