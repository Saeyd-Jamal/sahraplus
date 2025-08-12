<?php
namespace App\Repositories;

use App\Models\VideoDownloadMapping;

class VideoDownloadMappingRepository
{
	 /**
     * @var VideoDownloadMapping
     */
    protected VideoDownloadMapping $videoDownloadMapping;

    /**
     * VideoDownloadMapping constructor.
     *
     * @param VideoDownloadMapping $videoDownloadMapping
     */
    public function __construct(VideoDownloadMapping $videoDownloadMapping)
    {
        $this->videoDownloadMapping = $videoDownloadMapping;
    }

    /**
     * Get all videoDownloadMapping.
     *
     * @return VideoDownloadMapping $videoDownloadMapping
     */
    public function all()
    {
        return $this->videoDownloadMapping->get();
    }

     /**
     * Get videoDownloadMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->videoDownloadMapping->find($id);
    }

    /**
     * Save VideoDownloadMapping
     *
     * @param $data
     * @return VideoDownloadMapping
     */
     public function save(array $data)
    {
        return VideoDownloadMapping::create($data);
    }

     /**
     * Update VideoDownloadMapping
     *
     * @param $data
     * @return VideoDownloadMapping
     */
    public function update(array $data, int $id)
    {
        $videoDownloadMapping = $this->videoDownloadMapping->find($id);
        $videoDownloadMapping->update($data);
        return $videoDownloadMapping;
    }

    /**
     * Delete VideoDownloadMapping
     *
     * @param $data
     * @return VideoDownloadMapping
     */
   	 public function delete(int $id)
    {
        $videoDownloadMapping = $this->videoDownloadMapping->find($id);
        $videoDownloadMapping->delete();
        return $videoDownloadMapping;
    }
}
