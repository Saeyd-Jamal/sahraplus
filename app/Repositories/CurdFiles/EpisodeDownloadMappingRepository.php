<?php
namespace App\Repositories;

use App\Models\EpisodeDownloadMapping;

class EpisodeDownloadMappingRepository
{
	 /**
     * @var EpisodeDownloadMapping
     */
    protected EpisodeDownloadMapping $episodeDownloadMapping;

    /**
     * EpisodeDownloadMapping constructor.
     *
     * @param EpisodeDownloadMapping $episodeDownloadMapping
     */
    public function __construct(EpisodeDownloadMapping $episodeDownloadMapping)
    {
        $this->episodeDownloadMapping = $episodeDownloadMapping;
    }

    /**
     * Get all episodeDownloadMapping.
     *
     * @return EpisodeDownloadMapping $episodeDownloadMapping
     */
    public function all()
    {
        return $this->episodeDownloadMapping->get();
    }

     /**
     * Get episodeDownloadMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->episodeDownloadMapping->find($id);
    }

    /**
     * Save EpisodeDownloadMapping
     *
     * @param $data
     * @return EpisodeDownloadMapping
     */
     public function save(array $data)
    {
        return EpisodeDownloadMapping::create($data);
    }

     /**
     * Update EpisodeDownloadMapping
     *
     * @param $data
     * @return EpisodeDownloadMapping
     */
    public function update(array $data, int $id)
    {
        $episodeDownloadMapping = $this->episodeDownloadMapping->find($id);
        $episodeDownloadMapping->update($data);
        return $episodeDownloadMapping;
    }

    /**
     * Delete EpisodeDownloadMapping
     *
     * @param $data
     * @return EpisodeDownloadMapping
     */
   	 public function delete(int $id)
    {
        $episodeDownloadMapping = $this->episodeDownloadMapping->find($id);
        $episodeDownloadMapping->delete();
        return $episodeDownloadMapping;
    }
}
