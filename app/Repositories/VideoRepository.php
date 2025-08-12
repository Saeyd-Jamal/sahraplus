<?php
namespace App\Repositories;

use App\Models\Video;

class VideoRepository
{
	 /**
     * @var Video
     */
    protected Video $video;

    /**
     * Video constructor.
     *
     * @param Video $video
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Get all video.
     *
     * @return Video $video
     */
    public function all()
    {
        return $this->video->get();
    }

     /**
     * Get video by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->video->find($id);
    }

    /**
     * Save Video
     *
     * @param $data
     * @return Video
     */
     public function save(array $data)
    {
        return Video::create($data);
    }

     /**
     * Update Video
     *
     * @param $data
     * @return Video
     */
    public function update(array $data, int $id)
    {
        $video = $this->video->find($id);
        $video->update($data);
        return $video;
    }

    /**
     * Delete Video
     *
     * @param $data
     * @return Video
     */
   	 public function delete(int $id)
    {
        $video = $this->video->find($id);
        $video->delete();
        return $video;
    }
}
