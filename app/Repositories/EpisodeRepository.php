<?php
namespace App\Repositories;

use App\Models\Episode;

class EpisodeRepository
{
	 /**
     * @var Episode
     */
    protected Episode $episode;

    /**
     * Episode constructor.
     *
     * @param Episode $episode
     */
    public function __construct(Episode $episode)
    {
        $this->episode = $episode;
    }

    /**
     * Get all episode.
     *
     * @return Episode $episode
     */
    public function all()
    {
        return $this->episode->get();
    }

     /**
     * Get episode by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->episode->find($id);
    }

    /**
     * Save Episode
     *
     * @param $data
     * @return Episode
     */
     public function save(array $data)
    {
        return Episode::create($data);
    }

     /**
     * Update Episode
     *
     * @param $data
     * @return Episode
     */
    public function update(array $data, int $id)
    {
        $episode = $this->episode->find($id);
        $episode->update($data);
        return $episode;
    }

    /**
     * Delete Episode
     *
     * @param $data
     * @return Episode
     */
   	 public function delete(int $id)
    {
        $episode = $this->episode->find($id);
        $episode->delete();
        return $episode;
    }
}
