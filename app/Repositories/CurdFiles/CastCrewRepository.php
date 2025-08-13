<?php
namespace App\Repositories;

use App\Models\CastCrew;

class CastCrewRepository
{
	 /**
     * @var CastCrew
     */
    protected CastCrew $castCrew;

    /**
     * CastCrew constructor.
     *
     * @param CastCrew $castCrew
     */
    public function __construct(CastCrew $castCrew)
    {
        $this->castCrew = $castCrew;
    }

    /**
     * Get all castCrew.
     *
     * @return CastCrew $castCrew
     */
    public function all()
    {
        return $this->castCrew->get();
    }

     /**
     * Get castCrew by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->castCrew->find($id);
    }

    /**
     * Save CastCrew
     *
     * @param $data
     * @return CastCrew
     */
     public function save(array $data)
    {
        return CastCrew::create($data);
    }

     /**
     * Update CastCrew
     *
     * @param $data
     * @return CastCrew
     */
    public function update(array $data, int $id)
    {
        $castCrew = $this->castCrew->find($id);
        $castCrew->update($data);
        return $castCrew;
    }

    /**
     * Delete CastCrew
     *
     * @param $data
     * @return CastCrew
     */
   	 public function delete(int $id)
    {
        $castCrew = $this->castCrew->find($id);
        $castCrew->delete();
        return $castCrew;
    }
}
