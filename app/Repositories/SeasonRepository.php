<?php
namespace App\Repositories;

use App\Models\Season;

class SeasonRepository
{
	 /**
     * @var Season
     */
    protected Season $season;

    /**
     * Season constructor.
     *
     * @param Season $season
     */
    public function __construct(Season $season)
    {
        $this->season = $season;
    }

    /**
     * Get all season.
     *
     * @return Season $season
     */
    public function all()
    {
        return $this->season->get();
    }

     /**
     * Get season by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->season->find($id);
    }

    /**
     * Save Season
     *
     * @param $data
     * @return Season
     */
     public function save(array $data)
    {
        return Season::create($data);
    }

     /**
     * Update Season
     *
     * @param $data
     * @return Season
     */
    public function update(array $data, int $id)
    {
        $season = $this->season->find($id);
        $season->update($data);
        return $season;
    }

    /**
     * Delete Season
     *
     * @param $data
     * @return Season
     */
   	 public function delete(int $id)
    {
        $season = $this->season->find($id);
        $season->delete();
        return $season;
    }
}
