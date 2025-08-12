<?php
namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
	 /**
     * @var Comment
     */
    protected Comment $comment;

    /**
     * Comment constructor.
     *
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get all comment.
     *
     * @return Comment $comment
     */
    public function all()
    {
        return $this->comment->get();
    }

     /**
     * Get comment by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->comment->find($id);
    }

    /**
     * Save Comment
     *
     * @param $data
     * @return Comment
     */
     public function save(array $data)
    {
        return Comment::create($data);
    }

     /**
     * Update Comment
     *
     * @param $data
     * @return Comment
     */
    public function update(array $data, int $id)
    {
        $comment = $this->comment->find($id);
        $comment->update($data);
        return $comment;
    }

    /**
     * Delete Comment
     *
     * @param $data
     * @return Comment
     */
   	 public function delete(int $id)
    {
        $comment = $this->comment->find($id);
        $comment->delete();
        return $comment;
    }
}
