<?php
namespace App\Repositories;

use App\Models\VideoStreamContentMapping;

class VideoStreamContentMappingRepository
{
	 /**
     * @var VideoStreamContentMapping
     */
    protected VideoStreamContentMapping $videoStreamContentMapping;

    /**
     * VideoStreamContentMapping constructor.
     *
     * @param VideoStreamContentMapping $videoStreamContentMapping
     */
    public function __construct(VideoStreamContentMapping $videoStreamContentMapping)
    {
        $this->videoStreamContentMapping = $videoStreamContentMapping;
    }

    /**
     * Get all videoStreamContentMapping.
     *
     * @return VideoStreamContentMapping $videoStreamContentMapping
     */
    public function all()
    {
        return $this->videoStreamContentMapping->get();
    }

     /**
     * Get videoStreamContentMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->videoStreamContentMapping->find($id);
    }

    /**
     * Save VideoStreamContentMapping
     *
     * @param $data
     * @return VideoStreamContentMapping
     */
     public function save(array $data)
    {
        return VideoStreamContentMapping::create($data);
    }

     /**
     * Update VideoStreamContentMapping
     *
     * @param $data
     * @return VideoStreamContentMapping
     */
    public function update(array $data, int $id)
    {
        $videoStreamContentMapping = $this->videoStreamContentMapping->find($id);
        $videoStreamContentMapping->update($data);
        return $videoStreamContentMapping;
    }

    /**
     * Delete VideoStreamContentMapping
     *
     * @param $data
     * @return VideoStreamContentMapping
     */
   	 public function delete(int $id)
    {
        $videoStreamContentMapping = $this->videoStreamContentMapping->find($id);
        $videoStreamContentMapping->delete();
        return $videoStreamContentMapping;
    }
}
