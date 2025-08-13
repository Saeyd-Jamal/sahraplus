<?php
namespace App\Repositories;

use App\Models\LiveTvStreamContentMapping;

class LiveTvStreamContentMappingRepository
{
	 /**
     * @var LiveTvStreamContentMapping
     */
    protected LiveTvStreamContentMapping $liveTvStreamContentMapping;

    /**
     * LiveTvStreamContentMapping constructor.
     *
     * @param LiveTvStreamContentMapping $liveTvStreamContentMapping
     */
    public function __construct(LiveTvStreamContentMapping $liveTvStreamContentMapping)
    {
        $this->liveTvStreamContentMapping = $liveTvStreamContentMapping;
    }

    /**
     * Get all liveTvStreamContentMapping.
     *
     * @return LiveTvStreamContentMapping $liveTvStreamContentMapping
     */
    public function all()
    {
        return $this->liveTvStreamContentMapping->get();
    }

     /**
     * Get liveTvStreamContentMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->liveTvStreamContentMapping->find($id);
    }

    /**
     * Save LiveTvStreamContentMapping
     *
     * @param $data
     * @return LiveTvStreamContentMapping
     */
     public function save(array $data)
    {
        return LiveTvStreamContentMapping::create($data);
    }

     /**
     * Update LiveTvStreamContentMapping
     *
     * @param $data
     * @return LiveTvStreamContentMapping
     */
    public function update(array $data, int $id)
    {
        $liveTvStreamContentMapping = $this->liveTvStreamContentMapping->find($id);
        $liveTvStreamContentMapping->update($data);
        return $liveTvStreamContentMapping;
    }

    /**
     * Delete LiveTvStreamContentMapping
     *
     * @param $data
     * @return LiveTvStreamContentMapping
     */
   	 public function delete(int $id)
    {
        $liveTvStreamContentMapping = $this->liveTvStreamContentMapping->find($id);
        $liveTvStreamContentMapping->delete();
        return $liveTvStreamContentMapping;
    }
}
