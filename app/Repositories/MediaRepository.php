<?php
namespace App\Repositories;

use App\Models\Media;

class MediaRepository
{
	 /**
     * @var Media
     */
    protected Media $media;

    /**
     * Media constructor.
     *
     * @param Media $media
     */
    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    /**
     * Get all media.
     *
     * @return Media $media
     */
    public function all()
    {
        return $this->media->get();
    }

     /**
     * Get media by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->media->find($id);
    }

    /**
     * Save Media
     *
     * @param $data
     * @return Media
     */
     public function save(array $data)
    {
        return Media::create($data);
    }

     /**
     * Update Media
     *
     * @param $data
     * @return Media
     */
    public function update(array $data, int $id)
    {
        $media = $this->media->find($id);
        $media->update($data);
        return $media;
    }

    /**
     * Delete Media
     *
     * @param $data
     * @return Media
     */
   	 public function delete(int $id)
    {
        $media = $this->media->find($id);
        $media->delete();
        return $media;
    }
}
