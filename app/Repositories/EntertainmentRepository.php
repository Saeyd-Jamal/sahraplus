<?php
namespace App\Repositories;

use App\Models\Entertainment;

class EntertainmentRepository
{
	 /**
     * @var Entertainment
     */
    protected Entertainment $entertainment;

    /**
     * Entertainment constructor.
     *
     * @param Entertainment $entertainment
     */
    public function __construct(Entertainment $entertainment)
    {
        $this->entertainment = $entertainment;
    }

    /**
     * Get all entertainment.
     *
     * @return Entertainment $entertainment
     */
    public function all()
    {
        return $this->entertainment->get();
    }

     /**
     * Get entertainment by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->entertainment->find($id);
    }

    /**
     * Save Entertainment
     *
     * @param $data
     * @return Entertainment
     */
     public function save(array $data)
    {
        return Entertainment::create($data);
    }

     /**
     * Update Entertainment
     *
     * @param $data
     * @return Entertainment
     */
    public function update(array $data, int $id)
    {
        $entertainment = $this->entertainment->find($id);
        $entertainment->update($data);
        return $entertainment;
    }

    /**
     * Delete Entertainment
     *
     * @param $data
     * @return Entertainment
     */
   	 public function delete(int $id)
    {
        $entertainment = $this->entertainment->find($id);
        $entertainment->delete();
        return $entertainment;
    }
}
