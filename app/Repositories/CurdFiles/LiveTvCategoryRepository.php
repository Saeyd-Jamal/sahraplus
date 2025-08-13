<?php
namespace App\Repositories;

use App\Models\LiveTvCategory;

class LiveTvCategoryRepository
{
	 /**
     * @var LiveTvCategory
     */
    protected LiveTvCategory $liveTvCategory;

    /**
     * LiveTvCategory constructor.
     *
     * @param LiveTvCategory $liveTvCategory
     */
    public function __construct(LiveTvCategory $liveTvCategory)
    {
        $this->liveTvCategory = $liveTvCategory;
    }

    /**
     * Get all liveTvCategory.
     *
     * @return LiveTvCategory $liveTvCategory
     */
    public function all()
    {
        return $this->liveTvCategory->get();
    }

     /**
     * Get liveTvCategory by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->liveTvCategory->find($id);
    }

    /**
     * Save LiveTvCategory
     *
     * @param $data
     * @return LiveTvCategory
     */
     public function save(array $data)
    {
        return LiveTvCategory::create($data);
    }

     /**
     * Update LiveTvCategory
     *
     * @param $data
     * @return LiveTvCategory
     */
    public function update(array $data, int $id)
    {
        $liveTvCategory = $this->liveTvCategory->find($id);
        $liveTvCategory->update($data);
        return $liveTvCategory;
    }

    /**
     * Delete LiveTvCategory
     *
     * @param $data
     * @return LiveTvCategory
     */
   	 public function delete(int $id)
    {
        $liveTvCategory = $this->liveTvCategory->find($id);
        $liveTvCategory->delete();
        return $liveTvCategory;
    }
}
