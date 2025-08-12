<?php
namespace App\Repositories;

use App\Models\Livetv;

class LivetvRepository
{
	 /**
     * @var Livetv
     */
    protected Livetv $livetv;

    /**
     * Livetv constructor.
     *
     * @param Livetv $livetv
     */
    public function __construct(Livetv $livetv)
    {
        $this->livetv = $livetv;
    }

    /**
     * Get all livetv.
     *
     * @return Livetv $livetv
     */
    public function all()
    {
        return $this->livetv->get();
    }

     /**
     * Get livetv by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->livetv->find($id);
    }

    /**
     * Save Livetv
     *
     * @param $data
     * @return Livetv
     */
     public function save(array $data)
    {
        return Livetv::create($data);
    }

     /**
     * Update Livetv
     *
     * @param $data
     * @return Livetv
     */
    public function update(array $data, int $id)
    {
        $livetv = $this->livetv->find($id);
        $livetv->update($data);
        return $livetv;
    }

    /**
     * Delete Livetv
     *
     * @param $data
     * @return Livetv
     */
   	 public function delete(int $id)
    {
        $livetv = $this->livetv->find($id);
        $livetv->delete();
        return $livetv;
    }
}
