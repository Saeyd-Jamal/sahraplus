<?php
namespace App\Repositories;

use App\Models\EpisodeStreamContentMapping;

class EpisodeStreamContentMappingRepository
{
	 /**
     * @var EpisodeStreamContentMapping
     */
    protected EpisodeStreamContentMapping $episodeStreamContentMapping;

    /**
     * EpisodeStreamContentMapping constructor.
     *
     * @param EpisodeStreamContentMapping $episodeStreamContentMapping
     */
    public function __construct(EpisodeStreamContentMapping $episodeStreamContentMapping)
    {
        $this->episodeStreamContentMapping = $episodeStreamContentMapping;
    }

    /**
     * Get all episodeStreamContentMapping.
     *
     * @return EpisodeStreamContentMapping $episodeStreamContentMapping
     */
    public function all()
    {
        return $this->episodeStreamContentMapping->get();
    }

     /**
     * Get episodeStreamContentMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->episodeStreamContentMapping->find($id);
    }

    /**
     * Save EpisodeStreamContentMapping
     *
     * @param $data
     * @return EpisodeStreamContentMapping
     */
     public function save(array $data)
    {
        return EpisodeStreamContentMapping::create($data);
    }

     /**
     * Update EpisodeStreamContentMapping
     *
     * @param $data
     * @return EpisodeStreamContentMapping
     */
    public function update(array $data, int $id)
    {
        $episodeStreamContentMapping = $this->episodeStreamContentMapping->find($id);
        $episodeStreamContentMapping->update($data);
        return $episodeStreamContentMapping;
    }

    /**
     * Delete EpisodeStreamContentMapping
     *
     * @param $data
     * @return EpisodeStreamContentMapping
     */
   	 public function delete(int $id)
    {
        $episodeStreamContentMapping = $this->episodeStreamContentMapping->find($id);
        $episodeStreamContentMapping->delete();
        return $episodeStreamContentMapping;
    }
}
