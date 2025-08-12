<?php
namespace App\Repositories;

use App\Models\Review;

class ReviewRepository
{
	 /**
     * @var Review
     */
    protected Review $review;

    /**
     * Review constructor.
     *
     * @param Review $review
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * Get all review.
     *
     * @return Review $review
     */
    public function all()
    {
        return $this->review->get();
    }

     /**
     * Get review by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->review->find($id);
    }

    /**
     * Save Review
     *
     * @param $data
     * @return Review
     */
     public function save(array $data)
    {
        return Review::create($data);
    }

     /**
     * Update Review
     *
     * @param $data
     * @return Review
     */
    public function update(array $data, int $id)
    {
        $review = $this->review->find($id);
        $review->update($data);
        return $review;
    }

    /**
     * Delete Review
     *
     * @param $data
     * @return Review
     */
   	 public function delete(int $id)
    {
        $review = $this->review->find($id);
        $review->delete();
        return $review;
    }
}
